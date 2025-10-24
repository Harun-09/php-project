<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
    <h2>Transactions</h2>
    <a href="<?= $base_url ?>/transaction/create" class="btn btn-primary mb-2">Add Transaction</a>
</div>

<style>
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}
.table-bordered tbody tr:last-child td {
    border-bottom: 1px solid #dee2e6;
}
</style>

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th style="width:5%;">ID</th>
        <th style="width:15%;">Type</th>
        <th style="width:20%;">Reference No</th>
        <th style="width:10%;">Date</th>
        <th style="width:15%;">Warehouse</th>
        <th style="width:15%;">Product</th>
        <th style="width:10%;">Quantity</th>
        <th style="width:15%;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['transaction_type'] ?></td>
          <td><?= $row['reference_no'] ?></td>
          <td><?= $row['date'] ?></td>
          <td><?= $row['warehouse_name'] ?></td>
          <td><?= $row['product_name'] ?></td>
          <td><?= number_format($row['quantity'],2) ?></td>
          <td>
            <a href="<?= $base_url ?>/transaction/edit/<?= $row['id'] ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
            <a href="<?= $base_url ?>/transaction/delete/<?= $row['id'] ?>" 
               onclick="return confirm('Are you sure?')" 
               class="btn btn-sm btn-danger mb-1">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
