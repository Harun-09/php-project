<style>
  #itemsTable tbody tr:last-child td {
    border-bottom: 1px solid #a59c9c79;
  }
</style>

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
  <h2>Create Purchase</h2>
  <a href="<?= $base_url ?>/purchase/index" class="btn btn-secondary mb-2">Back to List</a>
</div>

<form id="purchaseForm" class="purchase-form">
  <div class="row mb-3">
    <div class="col-md-4">
      <label for="invoice_no" class="form-label">Invoice No</label>
      <input type="text" id="invoice_no" name="invoice_no" class="form-control" value="#000<?php echo Purchase::get_last_id() + 1; ?>" readonly>
    </div>

    <div class="col-md-4">
      <label for="purchase_date" class="form-label">Purchase Date</label>
      <input type="date" id="purchase_date" name="purchase_date" class="form-control" value="<?= date('Y-m-d') ?>">
    </div>

    <div class="col-md-4">
      <label for="supplier_id" class="form-label">Supplier</label>
      <?php
      echo Supplier::html_select("supplier");
      ?>

      <label>Supplier Address</label>
      <input type="text" name="supplier_address" class="supplierAddress" placeholder="Supplier Address">
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-4">
      <label>Warehouse</label>
      <select id="warehouse" name="warehouse" class="form-control">
        <?php
        $warehouses = Warehouse::all();
        foreach ($warehouses as $w) {
          echo "<option value='{$w->id}'>{$w->name}</option>";
        }
        ?>
      </select>

    </div>

    <div class="col-md-8">
      <label for="remarks" class="form-label">Remarks</label>
      <input type="text" id="remarks" name="remarks" class="form-control" placeholder="Optional notes...">
    </div>
  </div>



  <h5>Items</h5>
  <table class="table table-bordered" id="itemsTable">
    <thead class="table-light">
      <tr>
        <th style="width:5%">No.</th>
        <th style="width:25%">Product</th>
        <th style="width:8%" class="text-end">Qty</th>
        <th style="width:10%" class="text-end">Unit Price</th>
        <th style="width:10%" class="text-end">Uom</th>
        <th style="width:12%" class="text-end">Total</th>
        <th style="width:8%">Action</th>
      </tr>
      <tr>
        <?php $count = 1; ?>
        <td class="align-middle"><?php echo $count; ?></td>
        <td>
          <?php echo Product::html_select_raw("product"); ?>
        </td>
        <td>
          <input type="number" min="0" step="1" class="form-control form-control-sm qty" value="1">
        </td>
        <td>
          <input type="number" min="0" class="form-control form-control-sm price" value="">
        </td>
        <td>
          <?php echo Uom::html_select("uom"); ?>
        </td>
        <td class="line-total align-middle">0</td>
        <td class="action-cell">
          <button type="button" class="btn-info add-row">Add</button>
        </td>
        <?php $count++; ?>
      </tr>
    </thead>
    <tbody id="items">

    </tbody>
  </table>

  <div class="row justify-content-end">
    <div class="col-md-4">
      <table class="table table-sm">
        <tr>
          <th>Grand Total:</th>
          <td><input type="text" id="grandtotal" class="form-control" readonly></td>
        </tr>
        <tr>
          <th>Paid Amount:</th>
          <td><input type="number" id="paid_amount" class="form-control" value="0"></td>
        </tr>
      </table>
    </div>
  </div>

  <div class="actions">
    <button type="button" class="btn-success create" id="saveBtn">➕ Save Purchase</button>
    <button type="reset" class="btn-primary reset">Reset</button>
  </div>
</form>


<script src="<?= $base_url ?>/js/cart2.js"></script>
<script>
  $(function() {


    const cart = new Cart("purchase");
    printCart();

    $("#supplier").on("change", function() {
      let supplier_id = $(this).val();
      // alert(supplier_id);

      $.ajax({
        url: "<?= $base_url ?>/api/supplier/find",
        type: "GET",
        data: {
          id: supplier_id
        },

        success: function(res) {
          let data = JSON.parse(res);
          $(".supplierAddress").val(data.supplier.address);
        },
        error: function(err) {
          console.log(err);
        }
      });

    });


    $("#product").on("change", function() {
      let product_id = $(this).val();
      let product_name = $(this).find("option:selected").text();
      // alert(product_id);

      $.ajax({
        url: "<?= $base_url ?>/api/product/find",
        type: "GET",
        data: {
          id: product_id
        },
        success: function(res) {
          let data = JSON.parse(res);
          let price = data.product.purchase_price;
          $(".qty").val(1);
          $(".price").val(price);


          $(".line-total").text(price);
        },
        error: function(err) {
          console.log(err);
        }
      });

    });

    $(document).on("change", ".qty, .price", function() {
      let qty = parseFloat($(".qty").val());
      let price = parseFloat($(".price").val());

      $(".line-total").text(Math.round(qty * price));
    });

    $(".add-row").on("click", function() {
      let product_id = $("#product").val();
      let product_name = $("#product option:selected").text();
      let qty = parseFloat($(".qty").val());
      let price = parseFloat($(".price").val());
      let uom_id = $("#uom").val();
      let uom_name = $("#uom option:selected").text();
      let line_total = (Math.round(qty * price));

      let data = {
        id: product_id,
        name: product_name,
        qty: qty,
        price: price,
        uom_id: uom_id,
        uom_name: uom_name,
        line_total: line_total,
        warehouse_id: $("#warehouse").val()
      }
      cart.AddItem(data);
      printCart();
    })

    $(document).on("click", ".remove-row", function() {
      let id = $(this).data("id");
      cart.delItem(id);
      printCart();
    });

    function printCart() {
      let data = cart.getData();

      let html = "";

      let total = 0;

      data.forEach((element, i) => {

        let linetotal = (Math.round(element.qty * element.price));


        linetotal = Math.round(linetotal);
        total += linetotal;

        html += `
          <tr class="item-row">
          <td>${++i}</td>
          <td><span>${element.name}</span></td>
           <td><span>${parseFloat(element.qty)}</span></td>
          <td><span>${parseFloat(element.price)}</span></td>
           <td>${element.uom_name}</td>
         <td>${linetotal}</td>
         <td class="text-center">
         <button class="btn btn-sm btn-danger w-50 remove-row" data-id="${element.id}">
         Remove
         </button>
         </td>
          </tr>
          `;
      });


      $("#items").html(html);

      $("#grandtotal").val(Math.round(total));
      $("#paid_amount").val(Math.round(total));

    }

    $(".reset").on("click", function() {
      cart.clearItem();
      printCart();
    });

    $("#saveBtn").on("click", function() {



      let supplier_id = $("#supplier").val();
      let purchase_date = $("#purchase_date").val();
      let invoice_no = $("#invoice_no").val();
      let warehouse_name = $("#warehouse option:selected").text();
      let purchase_total = $("#grandtotal").val();
      let paid_amount = $("#grandtotal").val();

      let remarks = $("#remarks").val();

      let products = cart.getData();

      let data = {
        supplier_id,
        purchase_date,
        invoice_no,
        warehouse_name,
        purchase_total,
        paid_amount,

        remarks,
        products
      };


      // console.log("Sending Data:", data);


      $.ajax({
        url: "<?= $base_url ?>/api/purchase/save",
        type: "POST",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function(res) {
          console.log(res);
          cart.clearItem();
          printCart();

          // alert("Saved!");
        },
        error: function(err) {
          console.log(err);
        }


      });

    })

  });
</script>