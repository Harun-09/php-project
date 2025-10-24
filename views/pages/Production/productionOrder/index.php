<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
    <h2>Production Orders</h2>
    <!-- <a href="<?= $base_url ?>/productionorder/create" class="btn btn-primary mb-2">Add Production Order</a> -->
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
        <th style="width:15%;">Order ID</th>
        <th style="width:20%;">Product</th>
        <th style="width:10%;">Planned Qty</th>
        <th style="width:10%;">Produced Qty</th>
        <th style="width:15%;">Status</th>
        <th style="width:15%;">Start Date</th>
        <th style="width:15%;">End Date</th>
        <th style="width:15%;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['order_id'] ?></td>
          <td><?= $row['product_name'] ?></td>
          <td><?= number_format($row['planned_qty'],2) ?></td>
          <td><?= number_format($row['produced_qty'],2) ?></td>
          <td><?= $row['status'] ?></td>
          <td><?= $row['start_date'] ?></td>
          <td><?= $row['end_date'] ?></td>
          <td>
            <a href="<?= $base_url ?>/productionorder/edit/<?= $row['id'] ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
            <a href="<?= $base_url ?>/productionorder/delete/<?= $row['id'] ?>" 
               onclick="return confirm('Are you sure?')" 
               class="btn btn-sm btn-danger mb-1">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
