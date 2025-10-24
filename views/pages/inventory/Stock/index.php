<?php
// Get filters
$startDate = $_GET['start_date'] ?? '';
$endDate   = $_GET['end_date'] ?? '';
$productId = $_GET['product_id'] ?? '';

// Fetch stock summary
$stocks = Stock::find_report($startDate, $endDate, $productId);
?>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0">📦 Stock Report (Product Wise)</h4>
    </div>
    <div class="card-body">

      <!-- Filter Form -->
      <form method="get" class="row g-3 mb-4">
        <div class="col-md-3">
          <label class="form-label">Start Date</label>
          <input type="date" name="start_date" class="form-control" value="<?= htmlspecialchars($startDate) ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">End Date</label>
          <input type="date" name="end_date" class="form-control" value="<?= htmlspecialchars($endDate) ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Product</label>
          <select name="product_id" class="form-select">
            <option value="">-- All Products --</option>
            <?php foreach(Product::all() as $prod): ?>
              <option value="<?= $prod->id ?>" <?= ($productId == $prod->id ? 'selected' : '') ?>>
                <?= htmlspecialchars($prod->name) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
          <button type="submit" class="btn btn-success w-100">Filter</button>
        </div>
      </form>

      <!-- Stock Summary Table -->
      <?php if (!empty($stocks)): ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center align-middle">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Total IN</th>
              <th>Total OUT</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($stocks as $i => $s): ?>
              <tr>
                <td><?= $i+1 ?></td>
                <td><?= htmlspecialchars($s->product_name) ?></td>
                <td><?= number_format($s->total_in, 2) ?></td>
                <td><?= number_format($s->total_out, 2) ?></td>
                <td><strong><?= number_format($s->balance, 2) ?></strong></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php else: ?>
        <div class="alert alert-warning text-center">
          No data found for the selected filters.
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>
