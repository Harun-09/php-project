<!-- <!doctype html>
<html lang="bn">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Purchase Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --navy: #0b2454;
      --accent: #ff7a18;
      --muted: #6c757d;
    }

    body {
      background: #f4f6f8;
      font-family: Inter, Segoe UI, Roboto, Arial;
      color: #222;
      padding: 24px;
    }

    .invoice-card {
      max-width: 1000px;
      margin: 0 auto;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(10, 20, 40, .08);
    }

    .inv-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 22px 28px;
      background: linear-gradient(90deg, var(--navy), #123a6e);
      color: #fff;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .brand .logo {
      width: 48px;
      height: 40px;
      background: var(--accent);
      border-radius: 8px;
    }

    .brand .name {
      font-weight: 700;
      font-size: 18px;
      color: #fff;
    }

    .inv-title {
      font-size: 28px;
      font-weight: 800;
    }

    .meta {
      background: #fff;
      color: var(--navy);
      padding: 10px;
      border-radius: 8px;
      font-weight: 600;
      text-align: right;
    }

    .body {
      padding: 24px;
    }

    .flex-row {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      margin-bottom: 12px;
    }

    .box {
      flex: 1;
      min-width: 220px;
      background: #f9fbff;
      padding: 14px;
      border-radius: 8px;
    }

    .table thead th {
      background: #f4f7fb;
      color: var(--navy);
      font-weight: 700;
      border-bottom: 1px solid #e6eef8;
    }

    .table td,
    .table th {
      vertical-align: middle;
      border-top: 0;
      padding: 12px;
    }

    .totals-block {
      flex: 1;
      font-family: sans-serif;
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
      background-color: var(--accent);
      color: white;
      border-radius: 4px;
    }

    @media print {
      .btn-print {
        display: none;
      }
    }
  </style>
</head>

<body>
  <?php
 
//   $supplier = Supplier::find($purchase->supplier_id);
//   $warehouse = Warehouse::find($purchase->warehouse_id);
//   $purchase_items = PurchaseDetail::find_all_by_purchase_id($purchase->id);
  ?>

  <div class="invoice-card">
    <div class="inv-header">
      <div class="brand">
        <div class="logo"></div>
        <div>
          <h3 class="name">HEALTHCARE FREIGHT AND SUPPLY</h3>
          <div class="small-muted">Dhaka, Bangladesh</div>
          <small>Phone: +88 0123 456 789 · Email: hello@example.com</small>
        </div>
      </div>
      <div>
        <div class="inv-title">PURCHASE INVOICE</div>
        <div style="height:8px"></div>
        <div class="meta">
          <div>Invoice: <span>#<?= htmlspecialchars($purchase->invoice_no) ?></span></div>
          <div style="font-size:13px">Date: <?= date("d-m-Y", strtotime($purchase->purchase_date)) ?></div>
          <div><strong>Purchase ID:</strong> #<?= $purchase->id ?></div>
        </div>
      </div>
    </div>

    <div class="body">
      <div class="flex-row">
        <div class="box">
          <strong>Supplier Info</strong>
          <div style="height:8px"></div>
          <div><?= htmlspecialchars($supplier->name) ?></div>
          <div class="small-muted"><?= htmlspecialchars($supplier->address) ?></div>
          <div class="small-muted"><?= htmlspecialchars($supplier->email) ?></div>
          <div class="small-muted">Phone: <?= htmlspecialchars($supplier->phone) ?></div>
        </div>

        <div class="box">
          <strong>Warehouse</strong>
          <div style="height:8px"></div>
          <div><?= htmlspecialchars($warehouse->name) ?></div>
          <div class="small-muted"><?= htmlspecialchars($warehouse->location) ?></div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th style="width:6%">No.</th>
              <th>Description</th>
              <th style="width:10%">Qty</th>
              <th style="width:14%">Unit Price</th>
              <th style="width:14%" class="text-end">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $count = 1;
            $subtotal = 0;
            foreach ($purchase_items as $item):
              $product = Product::find($item['product_id']);
              $pname = $product ? $product->name : 'Unknown';
              $qty = $item['qty'];
              $price = $item['price'];
              $line_total = $qty * $price;
              $subtotal += $line_total;
            ?>
              <tr>
                <td><?= $count++ ?></td>
                <td><?= htmlspecialchars($pname) ?></td>
                <td><?= number_format($qty, 2) ?></td>
                <td><?= number_format($price, 2) ?></td>
                <td class="text-end"><?= number_format($line_total, 2) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <?php
      $discount = $purchase->discount ?? 0;
      $vat = $purchase->vat ?? 0;
      $after_discount = $subtotal - ($subtotal * $discount / 100);
      $grand_total = $after_discount + ($after_discount * $vat / 100);
      ?>

      <div class="mt-4 d-flex justify-content-end">
        <div class="totals-block" style="width:360px;">
          <div class="row">
            <div class="label">Subtotal</div>
            <div class="amount text-end"><?= number_format($subtotal, 2) ?></div>
          </div>
          <div class="row">
            <div class="label">Discount (<?= $discount ?>%)</div>
            <div class="amount text-end"><?= number_format($subtotal * $discount / 100, 2) ?></div>
          </div>
          <div class="row">
            <div class="label">VAT (<?= $vat ?>%)</div>
            <div class="amount text-end"><?= number_format($after_discount * $vat / 100, 2) ?></div>
          </div>
          <div class="row total fw-bold border-top mt-2 pt-2">
            <div class="label">Grand Total</div>
            <div class="amount text-end"><?= number_format($grand_total, 2) ?></div>
          </div>
        </div>
      </div>

      <div class="footer-actions mt-4">
        <a class="btn-print" href="javascript:window.print()">Print / Save PDF</a>
        <div class="small-muted">Received By: <?= htmlspecialchars($supplier->name) ?></div>
      </div>
    </div>
  </div>
</body>
</html> -->
