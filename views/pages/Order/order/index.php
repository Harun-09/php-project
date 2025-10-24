<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // current page
$perpage = 10;

// get total orders count
$total_orders = Order::count();
$total_pages = ceil($total_orders / $perpage);

// get paginated orders
$orders = Order::pagination($page, $perpage);
?>

<style>
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6; /* main border */
}

/* সব row-এ bottom border নিশ্চিত করা */
.table-bordered tbody tr td {
    border-bottom: 1px solid #dee2e6 !important;
}

/* table-footer বা last row ঠিক করতে */
.table-bordered tbody tr:last-child td {
    border-bottom: 1px solid #dee2e6 !important;
}
</style>


<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
    <h2>Orders</h2>
    <a href="<?= $base_url ?>/order/create" class="btn btn-primary mb-2">Add Order</a>
</div>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Order Date</th>
        <th>Delivery Date</th>
        <th>Shipping Address</th>
        <th>Order Total</th>
        <th>Paid Amount</th>
        <th>Discount</th>
        <th>Vat</th>
        <th>Warehouse</th> <!-- নতুন কলাম -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($orders)): ?>
        <?php foreach($orders as $order): ?>
          <tr>
            <td><?= $order->id ?></td>
            <td><?= $order->customer_id ?></td>
            <td><?= $order->order_date ?></td>
            <td><?= $order->delivery_date ?></td>
            <td><?= $order->shipping_address ?></td>
            <td><?= number_format($order->order_total, 2) ?></td>
            <td><?= number_format($order->paid_amount, 2) ?></td>
            <td><?= $order->discount ?></td>
            <td><?= $order->vat ?></td>
            <td><?= $order->warehouse_name ?></td> <!-- warehouse_name দেখানো -->
            <td class="d-flex gap-1">
              <a href="<?= $base_url ?>/order/show/<?= $order->id ?>" class="btn btn-sm btn-success mb-1">Show</a>
              <a href="<?= $base_url ?>/order/delete/<?= $order->id ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger mb-1">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="11" class="text-center">No orders found.</td> <!-- colspan 11 -->
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>


<!-- Pagination -->
<?php if($total_pages > 1): ?>
<nav aria-label="Orders Pagination">
  <ul class="pagination justify-content-center">
    <!-- Previous -->
    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $base_url ?>/order/index?page=<?= $page-1 ?>" tabindex="-1">Previous</a>
    </li>

    <!-- Page numbers -->
    <?php for($i=1; $i<=$total_pages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="<?= $base_url ?>/order/index?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>

    <!-- Next -->
    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $base_url ?>/order/index?page=<?= $page+1 ?>">Next</a>
    </li>
  </ul>
</nav>
<?php endif; ?>
