<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
    <h2>Order Status List</h2>
    <a href="<?= $base_url ?>/orderstatus/create" class="btn btn-primary mb-2">Add Status</a>
</div>

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th style="width:10%;">ID</th>
        <th style="width:70%;">Name</th>
        <th style="width:20%;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td>
            <a href="<?= $base_url ?>/orderstatus/edit/<?= $row['id'] ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
            <a href="<?= $base_url ?>/orderstatus/delete/<?= $row['id'] ?>" 
               onclick="return confirm('Are you sure?')" 
               class="btn btn-sm btn-danger mb-1">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
