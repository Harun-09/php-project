<?php

require_once(__DIR__ . '/../../models/Order/Category.Model.php');
class CategoryController{

    public function index(){
        $data= Category::GetAll();
        view("order", $data);
    }

    public function create(){
        view("order");
    }

    public function save(){
        if(isset($_POST['btn_save'])){
            $name = $_POST["name"];
            $description = $_POST["description"];
            $category = new Category(null, $name, $description);
            print_r($category->save());
            redirect();
        }
    }

    public function edit($id){
        $data = Category::find($id);
        view("order", $data);
    }

    public function update(){
        if(isset($_POST["btn_update"])){
            $id = $_POST["id"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $category = new Category($id, $name, $description);
            $category->update();
            redirect("category/index");
            exit;
        }
    }

    public function delete($id){
        Category::delete($id);
        redirect("category/index");
        exit;
    }
}
?>