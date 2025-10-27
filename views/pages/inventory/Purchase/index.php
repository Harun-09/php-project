<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = 10;

// get total purchase count
$total_purchases = Purchase::count();
$total_pages = ceil($total_purchases / $perpage);

// get paginated purchases
$purchases = Purchase::pagination($page, $perpage);
?>

<style>
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}

.table-bordered tbody tr td {
    border-bottom: 1px solid #dee2e6 !important;
    
}

.table-bordered tbody tr:last-child td {
    border-bottom: 1px solid #dee2e6 !important;
}
</style>

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
    <h2>Purchases</h2>
    <a href="<?= $base_url ?>/purchase/create" class="btn btn-primary mb-2">Add Purchase</a>
</div>

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Supplier</th>
        <th>Purchase Date</th>
        <th>Invoice No</th>
        <th>Warehouse</th>
        <th>Purchase Total</th>
        <th>Paid Amount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($purchases)): ?>
        <?php foreach($purchases as $purchase): ?>
          <tr>
            <td><?= $purchase->id ?></td>
            <td><?= $purchase->supplier_id ?></td>
            <td><?= $purchase->purchase_date ?></td>
            <td><?= $purchase->invoice_no ?></td>
            <td><?= $purchase->warehouse_name ?></td>
            <td><?= number_format($purchase->purchase_total, 2) ?></td>
            <td><?= number_format($purchase->paid_amount, 2) ?></td>
            <td class="d-flex gap-1">
              <a href="<?= $base_url ?>/purchase/show/<?= $purchase->id ?>" class="btn btn-sm btn-success mb-1">Show</a>
              <a href="<?= $base_url ?>/purchase/delete/<?= $purchase->id ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger mb-1">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="10" class="text-center">No purchases found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php if($total_pages > 1): ?>
<nav aria-label="Purchases Pagination">
  <ul class="pagination justify-content-center">
    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $base_url ?>/purchase/index?page=<?= $page-1 ?>" tabindex="-1">Previous</a>
    </li>

    <?php for($i=1; $i<=$total_pages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="<?= $base_url ?>/purchase/index?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>

    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $base_url ?>/purchase/index?page=<?= $page+1 ?>">Next</a>
    </li>
  </ul>
</nav>
<?php endif; ?>

