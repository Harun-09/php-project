<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="card-title mb-4 text-center">Edit Category</h2>

          <form method="post" action="<?= $base_url ?>/category/update">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div class="mb-3">
              <label for="name" class="form-label">Category Name</label>
              <input type="text" id="name" name="name" value="<?= $data['name'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea id="description" name="description" class="form-control" rows="3"><?= $data['description'] ?></textarea>
            </div>

            <div class="d-flex justify-content-between">
              <button type="submit" name="btn_update" class="btn btn-success">Update</button>
              <a href="<?= $base_url ?>/category/index" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
