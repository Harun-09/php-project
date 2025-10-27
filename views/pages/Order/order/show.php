<!doctype html>
<html lang="bn">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --navy: #0b2454;
      --accent: #ff7a18;
      --muted: #6c757d
    }

    body {
      background: #f4f6f8;
      font-family: Inter, Segoe UI, Roboto, Arial;
      color: #222;
      padding: 24px
    }

    .invoice-card {
      max-width: 1000px;
      margin: 0 auto;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(10, 20, 40, .08)
    }

    .inv-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 22px 28px;
      background: linear-gradient(90deg, var(--navy), #123a6e);
      color: #fff
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 14px
    }

    .brand .logo {
      width: 48px;
      height: 40px;
      background: var(--accent);
      border-radius: 8px
    }

    .brand .name {
      font-weight: 700;
      font-size: 18px;
      color: #fff
    }

    .inv-title {
      font-size: 28px;
      font-weight: 800
    }

    .meta {
      background: #fff;
      color: var(--navy);
      padding: 10px;
      border-radius: 8px;
      font-weight: 600;
      text-align: right
    }

    .body {
      padding: 24px
    }

    .flex-row {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      margin-bottom: 12px
    }

    .box {
      flex: 1;
      min-width: 220px;
      background: #f9fbff;
      padding: 14px;
      border-radius: 8px
    }

    .table thead th {
      background: #f4f7fb;
      color: var(--navy);
      font-weight: 700;
      border-bottom: 1px solid #e6eef8
    }

    .table td,
    .table th {
      vertical-align: middle;
      border-top: 0;
      padding: 12px
    }

    .text-right {
      text-align: right
    }

    .totals {
      display: flex;
      justify-content: flex-end;
      margin-top: 12px
    }

    .totals .list {
      width: 360px
    }

    .totals .row {
      display: flex;
      justify-content: space-between;
      padding: 10px 12px
    }

    .totals .row.total {
      background: linear-gradient(90deg, #0f3a74, #0b2454);
      color: #fff;
      font-weight: 800;
      border-radius: 6px
    }

    .notes {
      margin-top: 14px;
      color: var(--muted);
      font-size: 14px
    }

    .btn-print {
      background: var(--accent);
      color: #fff;
      padding: 10px 14px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 700
    }

    @media print {
      body {
        background: #fff
      }

      .btn-print {
        display: none
      }
    }

    .small-muted {
      color: var(--muted);
      font-size: 13px
    }

    .meta-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 8px
    }

    .meta-item {
      background: #fff;
      border-radius: 6px
    }

    .summary-section {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-top: 24px;
      gap: 24px;
    }

    .notes-block {
      max-width: 54%;
    }

    .notes {
      margin-bottom: 16px;
      font-family: sans-serif;
    }

    .totals-block {
      flex: 1;
      font-family: sans-serif;
    }

    .row {
      display: flex;
      justify-content: space-between;
      padding: 6px 12px;
    }

    .row.total {
      margin-top: 8px;
      border-top: 1px solid #ccc;
      font-weight: bold;
    }

    .label {
      font-weight: 700;
      width: 70%;
    }

    .amount {
      text-align: right;
      width: 30%;

    }

    .footer-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 24px;
    }

    .btn-print {
      text-decoration: none;
      padding: 6px 12px;
      background-color: #007bff;
      color: white;
      border-radius: 4px;
    }

    .small-muted {
      color: #666;
      font-size: 1em;
    }
  </style>
</head>

<body>
  <div class="invoice-card">
    <div class="inv-header">
      <div class="brand">
        <div class="logo" aria-hidden="true"></div>
        <div>
          <h3 class="name">HEALTHCARE FREIGHT AND SUPPLY</h3>
          <div class="small-muted">Dhaka, Bangladesh</div>
          <small class="text-muted">Phone: +88 0123 456 789 · Email: hello@example.com</small>
        </div>
      </div>
      <div>
        <div class="inv-title">INVOICE</div>
        <div style="height:8px"></div>
        <div class="meta">
          <div>Invoice: <span id="invoiceNo">#000<?php echo Order::get_last_id() + 1; ?></span></div>
          <div style="font-size:13px" id="invoiceDate">Issue: <?php echo date("d-m-y"); ?></div>
          <div class="meta-item"><strong>P.O. Number:</strong> #000<?php echo $order->id; ?>

          </div>
        </div>
      </div>
    </div>

    <div class="body">
      <div class="flex-row">
        <div class="box">
          <strong>Bill To</strong>
          <div style="height:8px"></div>
          <?php $customer =  Customer::find($order->customer_id); ?>
          <div id="billToName">
            <?php echo $customer->name ?>
          </div>
          <div class="small-muted" id="billToAddr"><?php echo $customer->address ?></div>
          <div class="small-muted" id="billToContact"><?php echo $customer->email ?></div>
        </div>

        <div style="width:360px">
          <div style="background:#fff;padding:12px;border-radius:8px;box-shadow:0 4px 14px rgba(10,20,40,.04)">
            <div class="meta-grid">

              <div class="meta-item"><strong>Shipping Method</strong>
                <div id="shipping_method"><?php
                                          $shipping_method = ShippingMethod::find($order->shipping_method_id);
                                          echo $shipping_method ? $shipping_method->name : "N/A";
                                          ?> </div>
              </div>
              <div class="meta-item"><strong>Ship To</strong>
                <div class="small-muted billToAddr"><?php echo Customer::find($order->customer_id)->address ?> </div>
              </div>
              <div class="meta-item"><strong>F.O.B. Point</strong>
                <div id="fobPoint">Unit</div>
              </div>
              <div class="meta-item"><strong>Due Date</strong>
                <div id="dueDate">11/01/2021</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table align-middle" aria-describedby="Invoice items">
          <thead>
            <tr>
              <th style="width:6%">No.</th>
              <th style="width:50%">Description</th>
              <th style="width:8%">Unit</th>
              <th style="width:8%">Qty</th>
              <th style="width:14%">Unit Price</th>
              <th style="width:14%" class="text-right">Amount</th>
            </tr>
          </thead>
          <tbody id="itemsBody">
            <!-- <?php
                  print_r(OrderDetail::find_all_by_order_id($order->id));
                  ?>  -->

            <?php

            $order_details = OrderDetail::find_all_by_order_id($order->id);
            $count = 1;
            $amount = 0;
            $subtotal = 0;
            $discount = 0;
            $tax = 0;

            foreach ($order_details as $value) :
              $product = Product::find($value["product_id"]);
              $product_name = $product ? $product->name : "unknown";
              $uom = $product ? Uom::find($product->uom_id) : null;
              $unit = $uom ? $uom->name : 'pcs';
              $qty = $value["qty"];
              $price = $value["price"];
              $amount = $price * $qty;
              $discount += $value['discount'];
              $subtotal += $amount;
              $tax += $value["vat"];

            ?>

              <tr class="item-row">
                <td class="align-middle"><?php echo $count; ?></td>
                <td class="align-middle"><?php echo htmlspecialchars($product_name); ?></td>
                <td class="align-middle"><?php echo htmlspecialchars($unit); ?></td>
                <td class="align-middle text-center"><?php echo number_format($qty, 0); ?></td>
                <td class="align-middle text-end"><?php echo number_format($price, 2); ?></td>
                <td class="align-middle text-end"><?php echo number_format($amount, 2); ?></td>
              </tr>

            <?php

              $count++;
            endforeach;


            $subtotal_after_discount = $subtotal - $discount;
            $grand_total = $subtotal_after_discount + $tax;

            ?>


          </tbody>
        </table>
      </div>


      <div class="summary-section">

        <div class="notes-block">
          <div class="notes">
            <strong>Payment Instructions</strong>
            <div id="paymentText">
              Please make all checks payable to Healthcare Freight and Supply. For questions, call: (xxx) xxx-xxxx.
            </div>
          </div>

          <div class="notes">
            <strong>Notes</strong>
            <div id="notes">Thank you for your business.</div>
          </div>
        </div>


        <div class="totals-block">
          <div class="row">
            <div class="label">Subtotal</div>
            <div class="amount"><?php echo number_format($subtotal, 2); ?></div>
          </div>
          <div class="row">
            <div class="label">Discount</div>
            <div class="amount"><?php echo number_format($discount, 2); ?></div>
          </div>
          <div class="row" style="padding:6px 12px">
            <div style="display:inline-block; width:70%; font-weight:700">Net Before Tax</div>
            <div style="display:inline-block; width:30%; text-align:right">
              <?php echo number_format($subtotal_after_discount, 2); ?>
            </div>
          </div>
          <div class="row">
            <div class="label">Sales Tax</div>
            <div class="amount"><?php echo number_format($tax, 2); ?></div>
          </div>
          <div class="row total">
            <div class="label">Total</div>
            <div class="amount"><?php echo number_format($grand_total, 2); ?></div>
          </div>


          <div class="footer-actions">
            <a class="btn-print" href="javascript:window.print()">Print / Save PDF</a>
            <div class="small-muted">If you have questions, contact: (xxx) xxx-xxxx</div>
          </div>
        </div>
      </div>


</body>

</html>