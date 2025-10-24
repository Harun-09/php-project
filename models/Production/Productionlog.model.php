<?php
class ProductionLog {
    public $id, $production_order_id, $shift, $produced_qty, $operator_name, $log_date, $remarks;

    public function __construct($id, $production_order_id, $shift, $produced_qty, $operator_name, $log_date, $remarks){
        $this->id = $id;
        $this->production_order_id = $production_order_id;
        $this->shift = $shift;
        $this->produced_qty = $produced_qty;
        $this->operator_name = $operator_name;
        $this->log_date = $log_date;
        $this->remarks = $remarks;
    }

    public function save(){
        global $db, $tx;
        $db->query("INSERT INTO {$tx}production_log (production_order_id, shift, produced_qty, operator_name, log_date, remarks, created_at, updated_at) VALUES ('$this->production_order_id','$this->shift','$this->produced_qty','$this->operator_name','$this->log_date','$this->remarks', NOW(), NOW())");
        return $db->insert_id;
    }

    public static function GetAll(){
        global $db, $tx;
        $result = $db->query("SELECT pl.*, po.product_id, po.planned_qty FROM {$tx}production_log pl LEFT JOIN {$tx}production_orders po ON pl.production_order_id=po.id ORDER BY pl.id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id){
        global $db, $tx;
        $result = $db->query("SELECT * FROM {$tx}production_log WHERE id=$id");
        return $result->fetch_assoc();
    }

    public function update(){
        global $db, $tx;
        return $db->query("UPDATE {$tx}production_log SET production_order_id='$this->production_order_id', shift='$this->shift', produced_qty='$this->produced_qty', operator_name='$this->operator_name', log_date='$this->log_date', remarks='$this->remarks', updated_at=NOW() WHERE id=$this->id");
    }

    public static function delete($id){
        global $db, $tx;
        return $db->query("DELETE FROM {$tx}production_log WHERE id=$id");
    }
}
?>
