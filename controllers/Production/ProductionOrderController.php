<?php
require_once(__DIR__ . '/../../models/Production/ProductionOrder.Model.php');
require_once(__DIR__ . '/../../models/order/Product.Model.php');

class ProductionOrderController
{

    public function index()
    {
        $data = ProductionOrder::GetAll();
        view("production", $data);
    }

    public function create()
    {
        $products = Product::GetAll();
        view("production", $products);
    }

    public function save()
    {
        if (isset($_POST['btn_save'])) {
            $order_id = $_POST["order_id"];
            $product_id = $_POST["product_id"];
            $planned_qty = $_POST["planned_qty"];
            $produced_qty = $_POST["produced_qty"];
            $status = $_POST["status"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $created_by = $_POST['created_by'];
            $productionOrder = new ProductionOrder(null, $order_id, $product_id, $planned_qty, $produced_qty, $status, $start_date, $end_date, $created_by);
            print_r($productionOrder->save());
            redirect();
        }
    }

    public function edit($id)
    {
        $data = ProductionOrder::find($id);
        $products = Product::GetAll();
        view("production", compact('data', 'products'));
    }

    public function update()
    {
        if (isset($_POST["btn_update"])) {
            $id = $_POST["id"];
            $order_id = $_POST["order_id"];
            $product_id = $_POST["product_id"];
            $planned_qty = $_POST["planned_qty"];
            $produced_qty = $_POST["produced_qty"];
            $status = $_POST["status"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $created_by = $_POST['created_by'];
            $productionOrder = new ProductionOrder($id, $order_id, $product_id, $planned_qty, $produced_qty, $status, $start_date, $end_date, $created_by);
            $productionOrder->update();
            redirect("productionorder/index");
            exit;
        }
    }

    public function delete($id)
    {
        ProductionOrder::delete($id);
        redirect("productionorder/index");
        exit;
    }
}
