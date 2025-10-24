<?php
class Category{
    public $id, $name, $description;

    public function __construct($id, $name, $description){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function save(){
        global $db, $tx;
        $category = "INSERT INTO {$tx}categories (name, description, created_at, updated_at) 
            VALUES ('$this->name', '$this->description', NOW(), NOW())";
        $db->query($category);
        return $db->insert_id;
    }

      public static function GetAll() {
        global $db, $tx;
        $category = $db->query("SELECT * FROM {$tx}categories ORDER BY id ASC");
        return $category->fetch_all(MYSQLI_ASSOC);
    }

      public static function find($id) {
        global $db, $tx;
        $category = $db->query("SELECT * FROM {$tx}categories WHERE id=$id");
        return $category->fetch_assoc();
    }

    public function update(){
        global $db, $tx;
        $category = $db->query("UPDATE {$tx}categories SET name='$this->name', description='$this->description', updated_at=NOW() WHERE id=$this->id");
        return $category;
    }

    public static function delete($id){
        global $db, $tx;
        $db->query("DELETE FROM {$tx}categories WHERE id=$id");
        return true;
    }
    
}
?>