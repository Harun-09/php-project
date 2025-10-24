<?php
require_once(__DIR__ . '/../../models/Order/OrderStatus.Model.php');

class OrderStatusController
{
    public function index()
    {
        $data = OrderStatus::GetAll();
        view("order", $data);
    }

    public function create()
    {
        view("order");
    }

    public function save()
    {
        if (isset($_POST['btn_save'])) {
            $name = $_POST["name"];
            $status = new OrderStatus(null, $name);
            $status->save();
            redirect("order");
        }
    }

    public function edit($id)
    {
        $data = OrderStatus::find($id);
        view("order", $data);
    }

    public function update()
    {
        if (isset($_POST['btn_update'])) {
            $id = intval($_POST["id"]);
            $name = $_POST["name"];
            $status = new OrderStatus($id, $name);
            $status->update();
            redirect("orderstatus/index");
        }
    }

    public function delete($id)
    {
        OrderStatus::delete($id);
        redirect("orderstatus/index");
    }
}
