<?php
class Transaction{
        public $id, $transaction_type, $reference_no, $date, $warehouse_id, $product_id, $quantity, $created_at, $updated_at;

    public function __construct($id, $transaction_type, $reference_no, $date, $warehouse_id, $product_id, $quantity)
    {
        $this->id = $id;
        $this->transaction_type = $transaction_type;
        $this->reference_no = $reference_no;
        $this->date = $date;
        $this->warehouse_id = $warehouse_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function save(){
        global $db, $tx;
        $transaction= $db->query("INSERT INTO {$tx}transactions (transaction_type, reference_no, date, warehouse_id, product_id, quantity, created_at) VALUES ('$this->transaction_type', '$this->reference_no', '$this->date', '$this->warehouse_id', '$this->product_id', '$this->quantity', NOW())");
        return $transaction;
    }

    public static function GetAll(){
        global $db, $tx;
        $result = $db->query("SELECT t.*, w.name AS warehouse_name, p.name AS product_name FROM {$tx}transactions t LEFT JOIN {$tx}warehouses w ON t.warehouse_id=w.id LEFT JOIN {$tx}products p ON t.product_id=p.id ORDER BY t.id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id)
    {
        global $db, $tx;
         $id = (int)$id;
        $result = $db->query("SELECT * FROM {$tx}transactions WHERE id=$id");
        return $result->fetch_assoc();
    }

    public function update (){
        global $db, $tx;
        $transaction= $db->query("UPDATE {$tx}transactions SET transaction_type='$this->transaction_type', reference_no='$this->reference_no', date='$this->date', warehouse_id='$this->warehouse_id', product_id='$this->product_id', quantity='$this->quantity'WHERE id=$this->id");
        return $transaction;
    }

    public static function delete($id){
        global $db, $tx;
        $result = $db->query("DELETE FROM {$tx}transactions WHERE id=$id");
        return $result;
    }
}
?>