<?php
class Product extends Model implements JsonSerializable
{
    public $id;
    public $name;
    public $category_id;
    public $uom_id;
    public $description;
    public $brand;
    public $price;
    public $is_raw;
    public $sku;
    public $tax;
    public $image;
    public $stock_qty;
    public $purchase_price;
    public $created_at;
    public $updated_at;

    public function __construct() {}

    public function set($id, $name, $category_id, $uom_id, $description, $brand, $price, $is_raw, $sku, $tax, $image, $stock_qty, $purchase_price, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category_id = $category_id;
        $this->uom_id = $uom_id;
        $this->description = $description;
        $this->brand = $brand;
        $this->price = $price;
        $this->is_raw = $is_raw;
        $this->sku = $sku;
        $this->tax = $tax;
        $this->image = $image;
        $this->stock_qty = $stock_qty;
        $this->purchase_price = $purchase_price;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function save()
    {
        global $db, $tx;
        $db->query("INSERT INTO {$tx}products(name,category_id,uom_id,description,brand,price,is_raw,sku,tax,image,stock_qty,purchase_price,created_at,updated_at)
        VALUES('$this->name','$this->category_id','$this->uom_id','$this->description','$this->brand','$this->price','$this->is_raw','$this->sku','$this->tax','$this->image','$this->stock_qty','$this->purchase_price','$this->created_at','$this->updated_at')");
        return $db->insert_id;
    }

    public function update()
    {
        global $db, $tx;
        $db->query("UPDATE {$tx}products SET 
        name='$this->name',
        category_id='$this->category_id',
        uom_id='$this->uom_id',
        description='$this->description',
        brand='$this->brand',
        price='$this->price',
        is_raw='$this->is_raw',
        sku='$this->sku',
        tax='$this->tax',
        image='$this->image',
        stock_qty='$this->stock_qty',
        purchase_price='$this->purchase_price',
        created_at='$this->created_at',
        updated_at='$this->updated_at' 
        WHERE id='$this->id'");
    }

    public static function delete($id)
    {
        global $db, $tx;
        $db->query("DELETE FROM {$tx}products WHERE id={$id}");
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    public static function all()
    {
        global $db, $tx;
        $result = $db->query("SELECT id,name,category_id,uom_id,description,brand,price,is_raw,sku,tax,image,stock_qty,purchase_price,created_at,updated_at FROM {$tx}products");
        $data = [];
        while ($product = $result->fetch_object()) {
            $data[] = $product;
        }
        return $data;
    }

    public static function GetAll()
    {
        global $db, $tx;
        $result = $db->query("SELECT * FROM {$tx}products ORDER BY id DESC");
        $products = [];
        while ($product = $result->fetch_object()) {
            $products[] = $product;
        }
        return $products;
    }

    public static function find($id)
    {
        global $db, $tx;
        $result = $db->query("SELECT * FROM {$tx}products WHERE id='$id'");
        if ($row = $result->fetch_object()) {
            $product = new Product();
            foreach ($row as $key => $value) {
                $product->$key = $value;
            }
            return $product;
        }
        return null;
    }


    static function get_last_id()
    {
        global $db, $tx;
        $result = $db->query("SELECT max(id) last_id FROM {$tx}products");
        $product = $result->fetch_object();
        return $product->last_id;
    }

    public function json()
    {
        return json_encode($this);
    }

    public function __toString()
    {
        return "Id:$this->id<br>Name:$this->name<br>Category Id:$this->category_id<br>Uom Id:$this->uom_id<br>Description:$this->description<br>Brand:$this->brand<br>Price:$this->price<br>Sku:$this->sku<br>Tax:$this->tax<br>Image:$this->image<br>Stock Qty:$this->stock_qty<br>Purchase Price:$this->purchase_price<br>Created At:$this->created_at<br>Updated At:$this->updated_at<br>";
    }

    //---------------- HTML Methods ----------------//

    static function html_select($name = "cmbProduct")
    {
        global $db, $tx;
        $html = "<select id='$name' name='$name'> ";
        $result = $db->query("SELECT id,name FROM {$tx}products");
        while ($product = $result->fetch_object()) {
            $html .= "<option value ='$product->id'>$product->name</option>";
        }
        $html .= "</select>";
        return $html;
    }

    static function html_select_raw($name = "cmbProduct")
    {
        global $db, $tx;
        $html = "<select id='$name' name='$name'> ";
        $result = $db->query("SELECT id,name FROM {$tx}products WHERE is_raw=1");
        while ($product = $result->fetch_object()) {
            $html .= "<option value ='$product->id'>$product->name</option>";
        }
        $html .= "</select>";
        return $html;
    }

    static function html_select_finished_products($name = "cmbProduct")
    {
        global $db, $tx;
        $html = "<select id='$name' name='$name'> ";
        $result = $db->query("SELECT id,name FROM {$tx}products WHERE is_raw=0");
        while ($product = $result->fetch_object()) {
            $html .= "<option value ='$product->id'>$product->name</option>";
        }
        $html .= "</select>";
        return $html;
    }

    static function pagination($page = 1, $perpage = 10, $criteria = "")
    {
        global $db, $tx;
        $top = ($page - 1) * $perpage;
        $result = $db->query("SELECT id,name,category_id,uom_id,description,brand,price,is_raw,sku,tax,image,stock_qty,purchase_price,created_at,updated_at FROM {$tx}products $criteria LIMIT $top,$perpage");
        $data = [];
        while ($product = $result->fetch_object()) {
            $data[] = $product;
        }
        return $data;
    }
}
