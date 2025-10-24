<?php
class ProductionOrder{
    public $id,$order_id,$product_id,$planned_qty,$produced_qty,$status,$start_date,$end_date,$created_by;

    public function __construct($id,$order_id,$product_id,$planned_qty,$produced_qty,$status,$start_date,$end_date,$created_by)
    {
       $this->id = $id;
       $this->order_id = $order_id;
       $this->product_id = $product_id;
       $this->planned_qty = $planned_qty;
       $this->produced_qty = $produced_qty;
       $this->status = $status;
       $this->start_date = $start_date;
       $this->end_date = $end_date;
       $this->created_by = $created_by; 
    }

    public function save(){
        global $db, $tx;
        $order= $db->query("INSERT INTO {$tx}production_orders (order_id,product_id,planned_qty,produced_qty,status,start_date,end_date,created_by) VALUES ('$this->order_id','$this->product_id','$this->planned_qty','$this->produced_qty','$this->status','$this->start_date','$this->end_date','$this->created_by')");
        return $order;
    }

    public static function GetAll(){
        global $db, $tx;
        $result = $db->query("SELECT po.*, p.name AS product_name FROM {$tx}production_orders po LEFT JOIN {$tx}products p ON po.product_id=p.id ORDER BY po.id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
    public static function find($id)
    {
        global $db, $tx;
        $result = $db->query("SELECT * FROM {$tx}production_orders WHERE id=$id");
        return $result->fetch_assoc();
    }

    public function update (){
        global $db, $tx;
        $order= $db->query("UPDATE {$tx}production_orders SET order_id='$this->order_id', product_id='$this->product_id', planned_qty='$this->planned_qty', produced_qty='$this->produced_qty', status='$this->status', start_date='$this->start_date', end_date='$this->end_date' WHERE id=$this->id");
        return $order;
    }

    public static function delete($id){
        global $db, $tx;
        $result = $db->query("DELETE FROM {$tx}production_orders WHERE id=$id");
        return $result;
    }
}
?>