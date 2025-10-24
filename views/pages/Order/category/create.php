<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="mb-0">Add Category</h4>
        </div>
        <div class="card-body">
          <form action="<?= $base_url ?>/category/save" method="post">

            <div class="mb-3">
              <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
              <input id="name" name="name" type="text" class="form-control" placeholder="Enter category name" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter description"></textarea>
            </div>

            <div class="d-flex justify-content-between">
              <button type="submit" name="btn_save" class="btn btn-success">Save</button>
              <a href="<?= $base_url ?>/category/index" class="btn btn-secondary">Cancel</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
