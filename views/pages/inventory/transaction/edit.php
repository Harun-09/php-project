<div class="container mt-4">
    <h2>Edit Transaction</h2>

    <?php if(!$data): ?>
        <div class="alert alert-danger">Transaction not found!</div>
        <a href="<?= $base_url ?>/transaction/index" class="btn btn-secondary">Back</a>
    <?php else: ?>
        <form action="<?= $base_url ?>/transaction/update" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?? '' ?>">

            <div class="mb-3">
                <label>Transaction Type</label>
                <input type="text" name="transaction_type" class="form-control" value="<?= $data['transaction_type'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label>Reference No</label>
                <input type="text" name="reference_no" class="form-control" value="<?= $data['reference_no'] ?? '' ?>">
            </div>

            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="<?= $data['date'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label>Warehouse</label>
                <select name="warehouse_id" class="form-control" required>
                    <option value="">Select Warehouse</option>
                    <?php foreach($warehouses as $w): ?>
                        <option value="<?= $w['id'] ?>" <?= isset($data['warehouse_id']) && $data['warehouse_id']==$w['id']?'selected':'' ?>><?= $w['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Product</label>
                <select name="product_id" class="form-control" required>
                    <option value="">Select Product</option>
                    <?php foreach($products as $p): ?>
                        <option value="<?= $p['id'] ?>" <?= isset($data['product_id']) && $data['product_id']==$p['id']?'selected':'' ?>><?= $p['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" step="0.01" name="quantity" class="form-control" value="<?= $data['quantity'] ?? '' ?>" required>
            </div>

            <button type="submit" name="btn_update" class="btn btn-success">Update</button>
            <a href="<?= $base_url ?>/transaction/index" class="btn btn-secondary">Cancel</a>
        </form>
    <?php endif; ?>
</div>
