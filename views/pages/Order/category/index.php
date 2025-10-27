<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
  <h2>Category List</h2>
  <a href="<?= $base_url ?>/category/create" class="btn btn-primary">Add Category</a>
</div>
<style>
  /* Table background dark and all text white */
  .table-custom {
    background-color: #343a40; /* dark background */
    color: white; /* all text white */
  }

  .table-custom th,
  .table-custom td {
    color: white; /* header & body text */
    border-color: #495057; /* optional: border color */
  }

  .table-custom a {
    color: #ffc107; /* optional: links color */
  }
</style>

<div class="table-responsive">
  <table class="table table-custom table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th style="width:10%;">ID</th>
        <th style="width:30%;">Name</th>
        <th style="width:40%;">Description</th>
        <th style="width:20%;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['description'] ?></td>
          <td>
            <a href="<?= $base_url ?>/category/edit/<?= $row['id'] ?>" class="btn btn-sm btn-success mb-1">Edit</a>
            <a href="<?= $base_url ?>/category/delete/<?= $row['id'] ?>" 
               onclick="return confirm('Are you sure?')" 
               class="btn btn-sm btn-danger mb-1">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

