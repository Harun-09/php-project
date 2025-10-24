<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>BOM + Expense | Production Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {

      /* শুধু BOM অংশ দেখাবে */
      body * {
        visibility: hidden;
      }

      #bomPrintSection,
      #bomPrintSection * {
        visibility: visible;
      }

      /* প্রিন্টে শুধু এই div দেখাক */
      #bomPrintSection {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
      }

      /* Sidebar, Navbar লুকানো */
      .sidebar,
      .navbar,
      .header,
      .btn,
      .footer {
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
</head>

<body>
  <div id="bomPrintSection">
    <div class="container py-5">
      <div class="card">
        <a href="<?= $base_url ?>/bom/index" class=" mb-2">Back to List</a>
        <div class="card-header">
          <h4 class="mb-0">🏭 BOM Form with Full Expense Summary</h4>
        </div>
        <div class="card-body">
          <form id="bomForm">
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-semibold">Product Name</label>
                <input type="text" name="product_name" class="form-control" value="<?php
                                                                                    $product = Product::find($bom->product_id);
                                                                                    echo $product->name;
                                                                                    ?>">
              </div>
              <div class="col-md-3">
                <label class="form-label fw-semibold">Product Code</label>
                <input type="text" name="product_code" class="form-control" value="<?php echo $bom->bom_code ?>">
              </div>
              <div class="col-md-3">
                <label class="form-label fw-semibold">Product Quantity</label>
                <div class="form-control bg-light fw-semibold" style="pointer-events: none;">
                  <?= $productQty ?? 1 ?>
                </div>
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
                      // echo "<pre>[DEBUG] BOM Detail: "; print_r($value); echo "</pre>";
                    $product = Product::find($value["raw_material_id"]);
                    $product_name = $product->name;
                    $qty = $value['quantity'];
                    $uom = $value["uom"];
                    $unit_cost = $product->purchase_price;
                    $total = $qty * $unit_cost;
                    $grand_total += $total;
                  ?>
                    <tr>
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
                    <th class="text-end"><?php echo number_format($grand_total, 2); ?></th>
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
                  <h5 id="laborCost" class="text-dark fw-semibold">
                    ৳ <?= number_format($laborExpense ? $laborExpense->amount : 0, 2) ?>
                  </h5>
                </div>
              </div>

              <div class="col-md-3">
                <div class="p-3 bg-light rounded shadow-sm">
                  <h6 class="text-muted mb-1">Overhead / Utilities</h6>
                  <h5 id="overheadCost" class="text-dark fw-semibold">
                    ৳ <?= number_format($overheadExpense ? $overheadExpense->amount : 0, 2) ?>
                  </h5>
                </div>
              </div>

              <div class="col-md-3">
                <div class="p-3 bg-light rounded shadow-sm">
                  <h6 class="text-muted mb-1">Packaging</h6>
                  <h5 id="packagingCost" class="text-dark fw-semibold">
                    ৳ <?= number_format($packagingExpense ? $packagingExpense->amount : 0, 2) ?>
                  </h5>
                </div>
              </div>

              <div class="col-md-3">
                <div class="p-3 bg-light rounded shadow-sm">
                  <h6 class="text-muted mb-1">Transport / Others</h6>
                  <h5 id="transportCost" class="text-dark fw-semibold">
                    ৳ <?= number_format($transportExpense ? $transportExpense->amount : 0, 2) ?>
                  </h5>
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
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <h5 class="fw-semibold text-dark">🔹 Per Unit Production Cost:</h5>
                </div>
                <div class="col-md-6 text-end">
                  <h4 id="grandTotal" class="text-success fw-bold">৳ 0.00</h4>
                </div>
              </div>
            </div>

            <div class="text-end mt-4">
              <button type="button" class="btn btn-primary px-4" onclick="window.print()">Print BOM</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




  <script>
    function parseAmount(id) {
      let text = $('#' + id).text().replace(/[৳,]/g, '').trim();
      return parseFloat(text) || 0;
    }

    function updateCosts() {
      let materialCost = parseAmount('totalMaterialCost');
      let labor = parseAmount('laborCost');
      let overhead = parseAmount('overheadCost');
      let packaging = parseAmount('packagingCost');
      let transport = parseAmount('transportCost');

      let totalExtra = labor + overhead + packaging + transport;
      $('#totalExtraCost').text('৳ ' + totalExtra.toFixed(2));

      let grandTotal = materialCost + totalExtra;
      $('#grandTotal').text('৳ ' + grandTotal.toFixed(2));
    }

    $(document).ready(updateCosts);
  </script>
</body>

</html>