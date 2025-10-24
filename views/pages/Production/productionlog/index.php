<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
    <h2>Production Log List</h2>
    <a href="<?= $base_url ?>/productionlog/create" class="btn btn-primary mb-2">Add Log</a>
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
        <th style="width:15%;">Production Order ID</th>
        <th style="width:10%;">Shift</th>
        <th style="width:10%;">Produced Qty</th>
        <th style="width:15%;">Operator</th>
        <th style="width:15%;">Log Date</th>
        <th style="width:20%;">Remarks</th>
        <th style="width:10%;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['production_order_id'] ?></td>
          <td><?= $row['shift'] ?></td>
          <td><?= number_format($row['produced_qty'],2) ?></td>
          <td><?= $row['operator_name'] ?></td>
          <td><?= $row['log_date'] ?></td>
          <td><?= $row['remarks'] ?></td>
          <td>
            <a href="<?= $base_url ?>/productionlog/edit/<?= $row['id'] ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
            <a href="<?= $base_url ?>/productionlog/delete/<?= $row['id'] ?>" 
               onclick="return confirm('Are you sure?')" 
               class="btn btn-sm btn-danger mb-1">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
