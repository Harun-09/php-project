<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="card-title mb-4 text-center">Edit Production Log</h4>

          <form action="<?= $base_url ?>/productionlog/update" method="post">
            <input type="hidden" name="id" value="<?= $data['data']['id'] ?>">

            <div class="mb-3">
              <label for="production_order_id" class="form-label">Production Order</label>
              <select id="production_order_id" name="production_order_id" class="form-control" required>
                <?php foreach($data['orders'] as $order): ?>
                  <option value="<?= $order['id'] ?>" <?= $order['id']==$data['data']['production_order_id']?'selected':'' ?>>
                    <?= $order['id'] ?> - <?= $order['product_name'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="shift" class="form-label">Shift</label>
              <input type="text" id="shift" name="shift" class="form-control" value="<?= $data['data']['shift'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="produced_qty" class="form-label">Produced Quantity</label>
              <input type="number" step="0.01" id="produced_qty" name="produced_qty" class="form-control" value="<?= $data['data']['produced_qty'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="operator_name" class="form-label">Operator Name</label>
              <input type="text" id="operator_name" name="operator_name" class="form-control" value="<?= $data['data']['operator_name'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="log_date" class="form-label">Log Date</label>
              <input type="date" id="log_date" name="log_date" class="form-control" value="<?= $data['data']['log_date'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="remarks" class="form-label">Remarks</label>
              <textarea id="remarks" name="remarks" class="form-control" rows="3"><?= $data['data']['remarks'] ?></textarea>
            </div>

            <div class="d-flex justify-content-between">
              <button type="submit" name="btn_update" class="btn btn-success">Update</button>
              <a href="<?= $base_url ?>/productionlog/index" class="btn btn-secondary">Cancel</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
