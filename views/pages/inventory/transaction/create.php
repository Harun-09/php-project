<div class="container mt-4">
    <h2>Create Transaction</h2>
    <form action="<?= $base_url ?>/transaction/save" method="POST">
        <div class="mb-3">
            <label>Transaction Type</label>
            <input type="text" name="transaction_type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Reference No</label>
            <input type="text" name="reference_no" class="form-control">
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Warehouse</label>
            <select name="warehouse_id" class="form-control" required>
                <option value="">Select Warehouse</option>
                <?php foreach($warehouses as $w): ?>
                    <option value="<?= $w['id'] ?>"><?= $w['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-control" required>
                <option value="">Select Product</option>
                <?php foreach($products as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" step="0.01" name="quantity" class="form-control" required>
        </div>
        <button type="submit" name="btn_save" class="btn btn-success">Save</button>
        <a href="<?= $base_url ?>/transaction/index" class="btn btn-secondary">Cancel</a>
    </form>
</div>
