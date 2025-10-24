<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Create Order</title>

  <style>

    .summary {

      width: 100%;
      max-width: 350px;
      margin-left: auto;
      margin-top: 20px;
      font-family: 'Segoe UI', sans-serif;
      font-size: 16px;
      color: #333;
    }


    .row {
      display: flex;
      justify-content: space-between;
      padding: 6px 0;
      border: none;
      font-size: 0.95rem;
    }

    .row.total {
      font-weight: bold;
      padding-top: 10px;
    }

    .label {
      flex: 1;
    }

    .amount {
      flex: 0;
      min-width: 120px;
      text-align: right;
      font-weight: 500;
    }

    .order-form table td input.qty,
    .order-form table td input.tax,
    .order-form table td input.discount {
      width: 60px;
      max-width: 100%;
      padding: 4px 6px;
      box-sizing: border-box;
      font-size: 0.85rem;
    }


    .order-form .remove-row,
    .order-form .add-row {
      width: 100%;
      padding: 6px 0;
      font-size: 0.85rem;
    }

    .tax {
      position: relative;
      padding-right: 20px;
      text-align: right;
    }

    .tax::after {

      position: absolute;
      right: 8px;
      color: gray;
    }

    .order-form td.action-cell {
      text-align: center;
      vertical-align: middle;
    }

    .order-form .add-row {
      padding: 6px 12px;
      font-size: 0.85rem;
      border-radius: 6px;
      background-color: #44ef7dff;

      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
      white-space: nowrap;
    }

    .order-form .add-row:hover {
      background-color: #26dc90ff;

    }


    .order-form {
      --accent: #0a66c2;
      --accent-light: #e8f0fe;
      --bg: #f8fafc;
      --border: #d0d7de;
      --text: #1f2937;
      --muted: #6b7280;
      --radius: 8px;
      background: #fff;
      border-radius: var(--radius);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
      max-width: 1000px;
      margin: 30px auto;
      padding: 30px 40px;
    }

    .order-form * {
      box-sizing: border-box;
      font-family: "Segoe UI", "Inter", Arial, sans-serif;
      color: var(--text);
    }

    .order-form .header-box {
      text-align: center;
      margin-bottom: 25px;
      border-bottom: 2px solid var(--accent-light);
      padding-bottom: 10px;
    }

    .order-form .header-box h2 {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--accent);
      margin: 0;
    }

    .order-form .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 24px;
      margin-bottom: 20px;
    }

    .order-form .field label {
      display: block;
      font-weight: 600;
      color: var(--muted);
      margin-bottom: 6px;
      margin-top: 10px;
    }

    .order-form .field input {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      font-size: 0.95rem;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .order-form .field input:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px var(--accent-light);
    }

    .order-form table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      margin-bottom: 15px;
    }

    .order-form table th,
    .order-form table td {
      border-bottom: 1px solid var(--border);
      padding: 10px;
      text-align: left;
    }

    .order-form table th {
      background: var(--accent-light);
      color: var(--accent);
      font-weight: 600;
      font-size: 0.9rem;
    }

    .order-form table td {
      font-size: 0.9rem;
    }

    .order-form table td.right,
    .order-form table th.right {
      text-align: right;
    }

    .order-form .actions {
      margin-top: 20px;
      text-align: right;
    }

    .order-form .btn {

      color: white;
      border: none;
      border-radius: var(--radius);
      padding: 10px 16px;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }

    .order-form .btn:hover {
      background: #004ea8;
    }

    .order-form .btn.secondary {
      background: #f3f4f6;
      color: var(--text);
      border: 1px solid var(--border);
    }

    .order-form .btn.secondary:hover {
      background: #e5e7eb;
    }

    .order-form .summary {
      margin-top: 25px;
      border-top: 2px solid var(--border);
      max-width: 350px;
      margin-left: auto;
      padding-top: 15px;
    }

    .order-form .summary .row {
      display: flex;
      justify-content: space-between;
      padding: 6px 0;
      font-size: 0.95rem;
    }

    .order-form .summary .total {
      font-weight: 700;
      border-top: 1px solid var(--border);
      margin-top: 8px;
      padding-top: 10px;
      color: var(--accent);
      font-size: 1.05rem;
    }

    @media (max-width: 600px) {
      .order-form {
        padding: 20px;
      }

      .order-form .actions {
        text-align: center;
      }
    }
  </style>
</head>

<body>
  <div class="order-form">
    <div class="header-box">
      <h2>Create Order & Generate Invoice</h2>
    </div>

    <form id="orderForm" action="create.php" method="post">
      <div class="content">
        <div class="grid">
          <div class="field">
            <label>Bill To Name</label>
            <?php
            echo Customer::html_select("customer");
            ?>
            <label>Billing Address</label>
            <input type="text" name="bill_to_address" class="billAddress" id="billToAddr" placeholder="Customer address">
            <label>Order Date</label>
            <input type="date" name="order_date" id="orderDate" value="<?php echo date('Y-m-d'); ?>" style="margin-top:10px;">

            <div>
              <label>Warehouse</label>
              <select id="warehouse" name="warehouse" class="form-control " style="height: 40px; width: 440px; border-radius: 8px;">
                <?php
                $warehouses = Warehouse::all();
                foreach ($warehouses as $w) {
                  echo "<option value='{$w->id}'>{$w->name}</option>";
                }
                ?>
              </select>

            </div>
          </div>

          <div class="field">
            <label>Ship To</label>
            <input type="text" name="ship_to" id="shipTo" value="Customer Receiver (optional)">
            <label>Shipping Address</label>
            <input type="text" name="ship_address" class=" billAddress shippingadd" id="shipAddress" value="shipaddress">
            <label>Delivery Date</label>
            <input type="date" name="delivery_date" id="deliveryDate" value="<?php echo date('Y-m-d'); ?>" style="margin-top:10px;">
            <label for="shipping_method">Shipping Method</label>
            <?php
            echo ShippingMethod::html_select("shipping_method"); ?>

          </div>
        </div>

        <table id="itemsTable" aria-label="Order items">
          <thead>
            <tr>
              <th style="width:5%">No.</th>
              <th style="width:30%">Product</th>
              <th style="width:10%">SKU</th>
              <th style="width:10%" class="right">Unit price</th>
              <th style="width:8%" class="right">Tax</th>
              <th style="width:6%" class="right">Qty</th>
              <th style="width:6%" class="right">Discount</th>
              <th style="width:12%" class="right">Line total</th>
              <th style="width:8%">Action</th>
            </tr>

            <tr>
              <?php $count = 1; ?>
              <td class="align-middle"><?php echo $count; ?></td>
              <td><?php echo Product::html_select_finished_products("product"); ?></td>
              <td class="sku align-middle">SKU123</td>

              <td class="price align-middle">0</td>

              <td>
                <input type="number" min="0" step="1" class="form-control form-control-sm tax" value="1">
              </td>



              <td>
                <input type="number" min="0" step="1" class="form-control form-control-sm qty" value="1">
              </td>

              <td>
                <input type="number" min="0" step="1" class="form-control form-control-sm discount" value="0">
              </td>


              <td class="line-total align-middle">00</td>

              <td class="action-cell">
                <button type="button" class="add-row">add</button>
              </td>
              <?php $count++; ?>
            </tr>

          </thead>


          <tbody id="items">

          </tbody>
        </table>

        <div class="summary">
          <div class="row">
            <span class="label">Subtotal</span>
            <span class="amount">৳ <span id="subtotal">0.00</span></span>
          </div>
          <div class="row">
            <span class="label">Discount</span>
            <span class="amount">৳ <span id="discount">0.00</span></span>
          </div>
          <div class="row">
            <span class="label">Tax</span>
            <span class="amount">৳ <span id="vat">0.00</span></span>
          </div>
          <div class="row total">
            <span class="label">Grand Total</span>
            <span class="amount">৳ <span id="grandTotal">0.00</span></span>
          </div>
        </div>



        <div class="actions">
          <button type="button" class="btn-success create " id="saveBtn">➕ Create order & generate invoice</button>
          <button type="reset" class="btn-secondary reset">Reset</button>
        </div>
      </div>

      <input type="hidden" name="items_json" id="items_json">
      <input type="hidden" name="currency" value="BDT">
    </form>
  </div>


  <script src="<?= $base_url ?>/js/cart2.js"></script>


  <script>
    $(function() {


      const cart = new Cart("order");
      printCart();

      $("#customer").on("change", function() {
        let customer_id = $(this).val();
        // alert(customer_id);

        $.ajax({
          url: "<?= $base_url ?>/api/customer/find",
          type: "GET",
          data: {
            id: customer_id
          },
          success: function(res) {
            // console.log("before json", res);
            let data = JSON.parse(res);
            // console.log("after json", data);
            $(".billAddress").val(data.address);
            $(".billAddress").val(data.customer.address);

          },
          error: function(err) {
            // console.log(err);
          }
        });


      });

      $("#product").on("change", function() {
        // let $row = $(this).closest("tr");
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
           // console.log(data.product.tax);

            let price = data.product.price;
            // console.log("after json",data);
            $(".sku").text(data.product.sku);
            $(".price").text(price);
            $(".tax").val(0);
            $(".qty").val(1);
            $(".discount").val(0);
            $(".line-total").text(price);
          },
          error: function(err) {
            // console.log(err);
          }
        });

      });


      $(document).on("change", ".tax, .discount, .qty ", function() {
        let $row = $(this).closest("tr");
        let qty = parseFloat($(".qty").val());
        let discount = parseFloat($(".discount").val());
        let tax = parseFloat($(".tax").val());
        let price = parseFloat($(".price").text());

        let subtotal = price * qty;
        let taxAmount = subtotal * (tax / 100);
        let discountAmount = subtotal * (discount / 100);
        $(".line-total").text(Math.round(subtotal + taxAmount - discountAmount));
      });



      $(".add-row").on("click", function() {
        let product_id = $("#product").val();
        let product_name = $("#product option:selected").text();
        let sku = $(".sku").text();
        let price = parseFloat($(".price").text());
        let tax = parseFloat($(".tax").val());
        let qty = parseFloat($(".qty").val());
        let discount = parseFloat($(".discount").val());

        let subtotal = price * qty;
        let taxAmount = subtotal * (tax / 100);
        let discountAmount = subtotal * (discount / 100);
        let line_total = (Math.round(subtotal + taxAmount - discountAmount));

       

        let data = {
          id: product_id,
          name: product_name,
          sku: sku,
          price: price,
          tax: tax,
          qty: qty,
          discount: discount,
          line_total: line_total,
          warehouse_id: $("#warehouse").val()
        }
        cart.AddItem(data);
        printCart();
      })

      $(document).on("click", ".remove-row", function() {
        let id = $(this).data("id");
        //console.log(id);
        cart.delItem(id);
        printCart();

      })


      function printCart() {
        let data = cart.getData();

        let html = "";
        let totalTax = 0;
        let total = 0;
        let totalDiscount = 0;
        let subtotal = 0
        let tax = 0;
        let discount = 0;
        data.forEach((element, i) => {
          tax += parseFloat(element.tax);
          discount += parseFloat(element.discount);
          let itemSubtotal = element.price * element.qty;
          let taxAmount = itemSubtotal * (element.tax / 100);
          let discountAmount = itemSubtotal * (element.discount / 100);
          let linetotal = (Math.round(itemSubtotal + taxAmount - discountAmount));

          subtotal += itemSubtotal;
          totalTax += taxAmount;
          totalDiscount += discountAmount;
          linetotal = Math.round(linetotal);
          total += linetotal;
          html += `
        <tr class="item-row">
         <td>${++i}</td>
         <td><span>${element.name}</span></td>
         <td><span>${element.sku}</span></td>
         <td><span>${parseFloat(element.price).toFixed(2)}</span></td>
         <td><span>${parseFloat(element.tax).toFixed(2)}</span></td>
         <td><span>${parseFloat(element.qty).toFixed(2)}</span></td>
         <td><span>${parseFloat(element.discount).toFixed(2)}</span></td>
         <td>${linetotal}</td>
         <td class="text-end">
         <button class="btn btn-sm btn-danger w-100 remove-row" data-id="${element.id}">
         Remove
         </button>
         </td>
         </tr>
        
        
        `;

        });

        $("#items").html(html);
        $("#subtotal").text(Math.round(subtotal));
        $("#discount").text(Math.round(totalDiscount));
        $("#vat").text(Math.round(totalTax));
        $("#grandTotal").text(Math.round(total));



      }

      $(".reset").on("click", function() {
        cart.clearItem();
        printCart();
      });


      $("#saveBtn").on("click", function(e) {
        e.preventDefault();
        let customer_id = $("#customer").val();
        let shipppingadd = $("#shipAddress").val();
        let order_total = $("#grandTotal").text();
        let vat = $("#vat").val();
        let shipping_method_id = $("#shipping_method").val();
        let discount = $("#discount").text();
        let order_date = new Date().toISOString();
        let delivery_date = new Date().toISOString();
       let warehouse_name = $("#warehouse option:selected").text();
        let products = cart.getData();

        let data = {
          customer_id: customer_id,
          order_total: order_total,
          shipping_address: shipppingadd,
          shipping_method_id,
          vat,
          discount,
          order_date,
          delivery_date,
            warehouse_name,
          products
        };


        $.ajax({
          url: "<?= $base_url ?>/api/order/save",
          type: "POST",
          contentType: "application/json",
          data: JSON.stringify(data),
          success: function(res) {
            console.log(res);

            if (res.success) {

              Toastify({

                text: "Order succes",
                close: true,
                gravity: "top",
                position: "center",
                duration: 2000,
                style: {
                  background: "linear-gradient(to right, #00b09b, #96c93d)",
                }


              }).showToast();



              // location.reload()
            }
            cart.clearItem();
            printCart();

          },
          error: function(err) {
            console.log(err);
          }
        });

      })

    })
  </script>



</body>

</html>