<?php
require_once(__DIR__ . '/../../models/Production/Productionlog.model.php');
require_once(__DIR__ . '/../../models/Production/ProductionOrder.Model.php');

class ProductionLogController
{

    public function index()
    {
        $data = productionLog::GetAll();
        view("production", $data);
    }

    public function create()
    {
        $orders = ProductionOrder::GetAll();
        view("production", $orders);
    }

    public function save()
    {
        if (isset($_POST['btn_save'])) {
            $production_order_id = $_POST["production_order_id"];
            $shift = $_POST["shift"];
            $produced_qty = $_POST["produced_qty"];
            $operator_name = $_POST["operator_name"];
            $log_date = $_POST["log_date"];
            $remarks = $_POST["remarks"];
            $productionLog = new ProductionLog(null, $production_order_id, $shift, $produced_qty, $operator_name, $log_date, $remarks);
            print_r($productionLog->save());
            redirect();
        }
    }

    public function edit($id)
    {
        $data = ProductionLog::find($id);
        $orders = ProductionOrder::GetAll();
        view("production", compact('data', 'orders'));
    }

    public function update()
    {
        if (isset($_POST["btn_update"])) {
            $id = $_POST["id"];
            $production_order_id = $_POST["production_order_id"];
            $shift = $_POST["shift"];
            $produced_qty = $_POST["produced_qty"];
            $operator_name = $_POST["operator_name"];
            $log_date = $_POST["log_date"];
            $remarks = $_POST["remarks"];
            $productionLog = new ProductionLog($id, $production_order_id, $shift, $produced_qty, $operator_name, $log_date, $remarks);
            $productionLog->update();
            redirect("productionlog/index");
            exit;
        }
    }

    public function delete($id)
    {
        ProductionLog::delete($id);
        redirect("productionlog/index");
        exit;
    }

}

?>