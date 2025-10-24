<?php
include_once "models/inventory/Transaction.Model.php";
class TransactionController{
    public function index(){
        $data = Transaction::GetAll();
       view("inventory", $data);
    }

   public function create(){
    $products = Product::GetAll();
    $warehouses = Warehouse::GetAll();
    view("inventory", compact('products', 'warehouses'));
   }

   public function save(){
    if(isset($_POST['btn_save'])){
        $transaction_type = $_POST['transaction_type'];
        $reference_no = $_POST['reference_no'];
        $date = $_POST['date'];
        $warehouse_id = $_POST['warehouse_id'];
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $transaction = new Transaction(null, $transaction_type, $reference_no, $date, $warehouse_id, $product_id, $quantity);
        $transaction->save();
        redirect();
    }
   }

    public function edit($id){
     $data = Transaction::find($id);
     $products = Product::GetAll();
     $warehouses = Warehouse::GetAll();
     view("inventory", compact('data', 'products', 'warehouses'));
    }

    public function update(){
        if(isset($_POST['btn_update'])){
            $id = $_POST['id'];
            $transaction_type = $_POST['transaction_type'];
            $reference_no = $_POST['reference_no'];
            $date = $_POST['date'];
            $warehouse_id = $_POST['warehouse_id'];
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $transaction = new Transaction($id, $transaction_type, $reference_no, $date, $warehouse_id, $product_id, $quantity);
            $transaction->update();
            redirect("transaction/index");
            exit;
        }
    }

    public function delete($id){
        Transaction::delete($id);
        redirect("transaction/index");
        exit;
    }
}
?>