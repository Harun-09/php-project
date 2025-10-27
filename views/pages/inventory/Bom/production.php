<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>BOM + Expense | Production Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    @media print {
      body * {
        visibility: hidden;
      }

      #bomPrintSection,
      #bomPrintSection * {
        visibility: visible;
      }

      #bomPrintSection {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
      }

      .sidebar,
      .navbar,
      .header,
      .btn,
      .footer,
      .back_list {
        display: none !important;
      }
    }

    body {
      background: #f5f7fa;
      font-family: "Segoe UI", sans-serif;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    }

    .card-header {
      background: #0a66c2;
      color: #fff;
      border-radius: 12px 12px 0 0;
    }

    .table th {
      background: #eef2f7;
      font-size: 13px;
      text-transform: uppercase;
    }

    .summary-box {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      padding: 20px;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body>
  <div id="bomPrintSection">
    <div class="container py-5">
      <div class="card">
        <a href="<?= $base_url ?>/bom/index" class="back_list mb-2">Back to List</a>
        <div class="card-header">
          <h4 class="mb-0">🏭 BOM Form with Full Expense Summary</h4>
        </div>
        <div class="card-body">
          <form id="bomForm">
            <!-- Hidden input for product_id -->
            <input type="hidden" id="product_id" name="product_id" value="<?= $bom->product_id ?>">

            <!-- <?php var_dump($bom->product_id); ?> -->
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-semibold">Product Name</label>
                <input type="text" name="product_name" class="form-control" id="product_name" value="<?php
                                                                                                      $product = Product::find($bom->product_id);
                                                                                                      echo htmlspecialchars($product->name);
                                                                                                      ?>">
              </div>
              <div class="col-md-3">
                <label class="form-label fw-semibold">Product Code</label>
                <input type="text" name="product_code" class="form-control" value="<?php echo htmlspecialchars($bom->bom_code) ?>">
              </div>
              <div class="col-md-3">
                <label class="form-label fw-semibold">Production Quantity</label>
                <input type="number" id="productQty" name="product_qty" class="form-control fw-semibold text-end" min="1" value="<?= $productQty ?? 1 ?>">
              </div>
            </div>

            <h5 class="fw-semibold mb-3 border-bottom pb-2">🧩 Material Details</h5>
            <div class="table-responsive">
              <table class="table table-bordered align-middle" id="bomTable">
                <thead>
                  <tr>
                    <th style="width:5%">#</th>
                    <th>Material</th>
                    <th style="width:12%">Qty</th>
                    <th style="width:12%">Uom</th>
                    <th style="width:12%">Unit Cost</th>
                    <th style="width:12%">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $bom_details = BomDetail::find_all_by_bom_id($bom->id);
                  $count = 1;
                  $grand_total = 0;
                  foreach ($bom_details as $value):
                    $product = product::find($value["raw_material_id"]);
                    $product_name = $product->name;
                    $qty = $value['quantity'];
                    $uom = $value["uom"];
                    $unit_cost = $product->purchase_price;
                    $total = $qty * $unit_cost;
                    $grand_total += $total;
                  ?>
                    <tr data-product-id="<?= $product->id ?>">
                      <td class="text-center"><?php echo $count++; ?></td>
                      <td><?php echo htmlspecialchars($product_name); ?></td>
                      <td class="text-end"><?php echo number_format($qty, 2); ?></td>
                      <td class="text-center"><?php echo htmlspecialchars($uom); ?></td>
                      <td class="text-end"><?php echo number_format($unit_cost, 2); ?></td>
                      <td class="text-end"><?php echo number_format($total, 2); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5" class="text-end">Grand Total:</th>
                    <th class="text-end" id="tfootMaterialTotal"><?php echo number_format($grand_total, 2); ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>

            <h5 class="fw-semibold mb-3 border-bottom pb-2">💵 Additional Expenses</h5>
            <?php
            $laborExpense     = Expense::latestByCategory('Labor Cost');
            $overheadExpense  = Expense::latestByCategory('Overhead / Utilities');
            $packagingExpense = Expense::latestByCategory('Packaging');
            $transportExpense = Expense::latestByCategory('Transport / Others');
            ?>
            <div class="row g-3 mb-3 text-center">
              <div class="col-md-3">
                <div class="p-3 bg-light rounded shadow-sm">
                  <h6 class="text-muted mb-1">Labor Cost</h6>
                  <h5 id="laborCost" class="text-dark fw-semibold">৳ <?= number_format($laborExpense ? $laborExpense->amount : 0, 2) ?></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="p-3 bg-light rounded shadow-sm">
                  <h6 class="text-muted mb-1">Overhead / Utilities</h6>
                  <h5 id="overheadCost" class="text-dark fw-semibold">৳ <?= number_format($overheadExpense ? $overheadExpense->amount : 0, 2) ?></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="p-3 bg-light rounded shadow-sm">
                  <h6 class="text-muted mb-1">Packaging</h6>
                  <h5 id="packagingCost" class="text-dark fw-semibold">৳ <?= number_format($packagingExpense ? $packagingExpense->amount : 0, 2) ?></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="p-3 bg-light rounded shadow-sm">
                  <h6 class="text-muted mb-1">Transport / Others</h6>
                  <h5 id="transportCost" class="text-dark fw-semibold">৳ <?= number_format($transportExpense ? $transportExpense->amount : 0, 2) ?></h5>
                </div>
              </div>
            </div>

            <div class="summary-box mt-4">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="fw-semibold">Total Material Cost:</h6>
                  <h5 id="totalMaterialCost" class="text-primary"><?php echo number_format($grand_total, 2); ?></h5>
                </div>
                <div class="col-md-6 text-end">
                  <h6 class="fw-semibold">Total Additional Expense:</h6>
                  <h5 id="totalExtraCost" class="text-warning">৳ 0.00</h5>
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-md-6">
                  <h5 class="fw-semibold text-dark">🔹Total Production Cost:</h5>
                </div>
                <div class="col-md-6 text-end">
                  <h4 id="grandTotal" class="text-success fw-bold">৳ 0.00</h4>
                </div>
              </div>
            </div>

            <div class="text-end mt-4">
              <button type="button" class="btn-success create" id="saveBtn">➕ Save Production</button>
              <button type="button" class="btn btn-primary fs-5 mx-5 px-5 px-4" onclick="window.print()">Print BOM</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // 1. মূল ডেটা সেটিং (বেস মান)
      $("#bomTable tbody tr").each(function() {
        let qty = parseFloat($(this).find("td:eq(2)").text().replace(/,/g, "")) || 0;
        let cost = parseFloat($(this).find("td:eq(4)").text().replace(/,/g, "")) || 0;
        $(this).attr("data-base-qty", qty);
        $(this).attr("data-unit-cost", cost);
      });

      // 2. টাকা বা ৳ পার্সিং ফাংশন
      function parseBdtAmount(text) {
        return parseFloat(text.replace(/[৳,]/g, '')) || 0;
      }

      // 3. ডাইনামিক ডেটা সেটিং
      $("#laborCost").attr("data-base", parseBdtAmount($("#laborCost").text()));
      $("#overheadCost").attr("data-base", parseBdtAmount($("#overheadCost").text()));
      $("#packagingCost").attr("data-base", parseBdtAmount($("#packagingCost").text()));
      $("#transportCost").attr("data-base", parseBdtAmount($("#transportCost").text()));

      // 4. হিসাব ফাংশন
      function calculateTotals() {
        let qty = parseFloat($("#productQty").val()) || 1;
        let materialGrandTotal = 0;

        $("#bomTable tbody tr").each(function() {
          let baseQty = parseFloat($(this).attr("data-base-qty")) || 0;
          let unitCost = parseFloat($(this).attr("data-unit-cost")) || 0;
          let newQty = baseQty * qty;
          let newTotal = newQty * unitCost;

          $(this).find("td:eq(2)").text(newQty.toFixed(2));
          $(this).find("td:eq(5)").text(newTotal.toFixed(2));
          materialGrandTotal += newTotal;
        });

        $("#tfootMaterialTotal").text(materialGrandTotal.toFixed(2));
        $("#totalMaterialCost").text(materialGrandTotal.toFixed(2));

        // অতিরিক্ত খরচ
        let labor = parseFloat($("#laborCost").attr("data-base")) * qty;
        let overhead = parseFloat($("#overheadCost").attr("data-base")) * qty;
        let packaging = parseFloat($("#packagingCost").attr("data-base")) * qty;
        let transport = parseFloat($("#transportCost").attr("data-base")) * qty;

        $("#laborCost").text("৳ " + labor.toFixed(2));
        $("#overheadCost").text("৳ " + overhead.toFixed(2));
        $("#packagingCost").text("৳ " + packaging.toFixed(2));
        $("#transportCost").text("৳ " + transport.toFixed(2));

        let totalExtra = labor + overhead + packaging + transport;
        $("#totalExtraCost").text("৳ " + totalExtra.toFixed(2));

        // মোট খরচ
        let grandTotal = materialGrandTotal + totalExtra;
        $("#grandTotal").text("৳ " + grandTotal.toFixed(2));
      }

      // 5. ইনপুট পরিবর্তনে হিসাব আপডেট
      $(document).on("input", "#productQty", calculateTotals);
      calculateTotals();

      // 6. ডেটা পাঠানোর জন্য
      $("#saveBtn").on("click", function() {
        // প্রোডাক্টের নাম ও কোড
        let product_name = $("#product_name").val();
        let product_code = $("input[name='product_code']").val();


        // product_id from hidden input
        let product_id = parseInt($("#product_id").val());
        if (isNaN(product_id)) {
          alert("প্রোডাক্ট আইডি নেই বা ভুল");
          return;
        }

        // ডেটা যাচাই
        if (!product_id) {
          alert("প্রোডাক্ট আইডি নেই। দয়া করে নিশ্চিত করুন যে, এটি ডেটা পাঠানো হচ্ছে।");
          return;
        }

        // উপাদান ডেটা সংগ্রহ
        let components = [];
        $("#bomTable tbody tr").each(function() {
          let productName = $(this).find("td:eq(1)").text().trim();
          let qty = parseFloat($(this).find("td:eq(2)").text().replace(/,/g, "")) || 0;
          let uom = $(this).find("td:eq(3)").text().trim();
          let unitCost = parseFloat($(this).find("td:eq(4)").text().replace(/,/g, "")) || 0;
          let total = parseFloat($(this).find("td:eq(5)").text().replace(/,/g, "")) || 0;


          components.push({
            id: $(this).data("product-id"),
            produced_qty: parseFloat($(this).find("td:eq(2)").text().replace(/,/g, "")) || 0,
            qty: parseFloat($(this).find("td:eq(2)").text().replace(/,/g, "")) || 0,
            operator_name: "", // optional, backend default ""
            remarks: "", // optional
            warehouse_id: 1
          });

          console.log("Components:", components);
        });

        // অতিরিক্ত খরচের মান
        let labor = parseBdtAmount($("#laborCost").text());
        let overhead = parseBdtAmount($("#overheadCost").text());
        let packaging = parseBdtAmount($("#packagingCost").text());
        let transport = parseBdtAmount($("#transportCost").text());

        // মোট খরচ
        let total_cost = labor + overhead + packaging + transport + components.reduce((a, b) => a + b.total, 0);
        let produced_qty = parseFloat($("#productQty").val()) || 1;

        if (isNaN(produced_qty)) {
          produced_qty = 1;
        }
        // ডেটা অবজেক্ট পাঠানো
        let data = {
          product_name,
          product_id: parseInt($("#product_id").val()),
          product_code,
          produced_qty: produced_qty,
          components,
          total_cost
        };

        console.log(data);
        // console.log("product_id value before sending:", $("#product_id").val());

        // AJAX কল
        $.ajax({
          url: "<?= $base_url ?>/api/production/save",
          type: "POST",
          data: JSON.stringify(data),
          contentType: "application/json",

          success: function(res) {
            console.log("Sending payload:", data);
            alert("প্রোডাকশন সফলভাবে সংরক্ষিত হয়েছে!");
          },
          error: function(err) {
            console.error("AJAX Error:", err);
            alert("সঞ্চয় করতে সমস্যা হয়েছে, কনসোলে দেখুন।");
          }
        });
      });
    });
  </script>
</body>

</html>