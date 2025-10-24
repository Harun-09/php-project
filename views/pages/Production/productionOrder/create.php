<!-- <div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="mb-0">Add Production Order</h4>
        </div>
        <div class="card-body">
          <form action="<?= $base_url ?>/productionorder/save" method="post">
            
            <div class="mb-3">
              <label for="order_id" class="form-label">Order ID</label>
              <input type="number" id="order_id" name="order_id" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="product_id" class="form-label">Product</label>
              <select id="product_id" name="product_id" class="form-control" required>
                <option value="">Select Product</option>
                <?php foreach($data as $product): ?>
                  <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="planned_qty" class="form-label">Planned Quantity</label>
              <input type="number" step="0.01" id="planned_qty" name="planned_qty" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="produced_qty" class="form-label">Produced Quantity</label>
              <input type="number" step="0.01" id="produced_qty" name="produced_qty" class="form-control" value="0" required>
            </div>

            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select id="status" name="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="In_Progress">In Progress</option>
                <option value="Completed">Completed</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="start_date" class="form-label">Start Date</label>
              <input type="date" id="start_date" name="start_date" class="form-control">
            </div>

            <div class="mb-3">
              <label for="end_date" class="form-label">End Date</label>
              <input type="date" id="end_date" name="end_date" class="form-control">
            </div>

            <div class="mb-3">
              <label for="created_by" class="form-label">Created By</label>
              <input type="number" id="created_by" name="created_by" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
              <button type="submit" name="btn_save" class="btn btn-success">Save</button>
              <a href="<?= $base_url ?>/productionorder/index" class="btn btn-secondary">Cancel</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->
