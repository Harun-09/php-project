<?php
class OrderStatus {
    public $id, $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function save()
    {
        global $db, $tx;
        $data = "INSERT INTO {$tx}order_status (name) VALUES ('$this->name')";
        $db->query($data);
        return $db->insert_id;
    }

    public static function GetAll()
    {
        global $db, $tx;
        $data = $db->query("SELECT * FROM {$tx}order_status ORDER BY id ASC");
        return $data->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id)
    {
        global $db, $tx;
        $data = $db->query("SELECT * FROM {$tx}order_status WHERE id=$id");
        return $data->fetch_assoc();
    }

    public function update()
    {
        global $db, $tx;
        $data = "UPDATE {$tx}order_status SET name='$this->name' WHERE id=$this->id";
        return $db->query($data);
    }

    public static function delete($id)
    {
        global $db, $tx;
        $id = intval($id);
        $db->query("DELETE FROM {$tx}order_status WHERE id=$id");
        return true;
    }
}
