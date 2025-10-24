<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="card-title mb-4 text-center">Edit Production Order</h4>

          <form action="<?= $base_url ?>/productionorder/update" method="post">
            <input type="hidden" name="id" value="<?= $data['data']['id'] ?>">

            <div class="mb-3">
              <label for="order_id" class="form-label">Order ID</label>
              <input type="number" id="order_id" name="order_id" class="form-control" value="<?= $data['data']['order_id'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="product_id" class="form-label">Product</label>
              <select id="product_id" name="product_id" class="form-control" required>
                <?php foreach($data['products'] as $product): ?>
                  <option value="<?= $product['id'] ?>" <?= $product['id']==$data['data']['product_id'] ? 'selected' : '' ?>>
                    <?= $product['name'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="planned_qty" class="form-label">Planned Quantity</label>
              <input type="number" step="0.01" id="planned_qty" name="planned_qty" class="form-control" value="<?= $data['data']['planned_qty'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="produced_qty" class="form-label">Produced Quantity</label>
              <input type="number" step="0.01" id="produced_qty" name="produced_qty" class="form-control" value="<?= $data['data']['produced_qty'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select id="status" name="status" class="form-control" required>
                <option value="Pending" <?= $data['data']['status']=='Pending'?'selected':'' ?>>Pending</option>
                <option value="In_Progress" <?= $data['data']['status']=='In_Progress'?'selected':'' ?>>In Progress</option>
                <option value="Completed" <?= $data['data']['status']=='Completed'?'selected':'' ?>>Completed</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="start_date" class="form-label">Start Date</label>
              <input type="date" id="start_date" name="start_date" class="form-control" value="<?= $data['data']['start_date'] ?>">
            </div>

            <div class="mb-3">
              <label for="end_date" class="form-label">End Date</label>
              <input type="date" id="end_date" name="end_date" class="form-control" value="<?= $data['data']['end_date'] ?>">
            </div>

            <div class="mb-3">
              <label for="created_by" class="form-label">Created By</label>
              <input type="number" id="created_by" name="created_by" class="form-control" value="<?= $data['data']['created_by'] ?>">
            </div>

            <div class="d-flex justify-content-between">
              <button type="submit" name="btn_update" class="btn btn-success">Update</button>
              <a href="<?= $base_url ?>/productionorder/index" class="btn btn-secondary">Cancel</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
