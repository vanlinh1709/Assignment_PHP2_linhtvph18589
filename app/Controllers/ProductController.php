<?php
  //+Kết hợp với autoload để index.php tự động require file này khi class HomeController được gọi
  //+Vấn đề bị trùng tên phương thức được loại bỏ

  //Toàn bộ class, obj, const là không gian của App\Controllers
  namespace App\Controllers;
  use App\Models\Product;
  class ProductController extends BaseController{
    //listProduct() trả về đoạn mã html(của view tương ứng) 
    //+ dữ liệu bên trong bảng products(nhờ vào method bên models).
    
    public function listProduct() {    
      $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
      if(empty($keyword)) {
        $products = Product::all();
      } else {
        $products = Product::where('name', 'like', "%$keyword%")->get();
      }
      // include './app/Views/product/list.php';//đường dẫn phải tính từ file index.php
      $this->render('product.list', compact('keyword', 'products'));
    }
    //Add new product
    public function productAddForm() {
      $this->render('product.add-form');
    }
    public function addNewProduct() {
      $model = new Product();
      $filename = "";
         $avatarFile = $_FILES['main_image'];
         if($avatarFile['size'] > 0){
             $filename = uniqid() . '-' . $avatarFile['name'];
             move_uploaded_file($avatarFile['tmp_name'], './public/uploads/products/' . $filename);
             $filename = "public/uploads/products/" . $filename;
         }
      $model->main_image = $filename;   
      $model->fill($_POST);
      $model->save();
      header("location: list-product");die;
    }
    //
    public function delProduct() {
      $id = $_GET['id'];
      Product::destroy($id);
      header('location:list-product');die;
    }
    //
    public function productEditForm() {
      //1. Ta cần lấy dữ liệu của product đang muốn sửa, đề chèn vào form edit
      $id = $_GET['id'];
      $product = Product::find($id);
      // echo '<pre>';
      // var_dump($product);
      //Vì trong product thì giá trị trong cột role_id là 1, 2, 3. Cho nên nếu ta muốn hiển thị "Nhân viên", "Quản lý"
      //lên form tà cần bảng Role có chứa cột định nghĩa cho các role_id: 1,2,3     
      $this->render('product.edit-form', compact('product'));
    }
    public function saveEditProduct(){
      $id = $_GET['id'];
      $product = Product::find($id);
      var_dump($product);
       $filename = $product->main_image;
        $avatarFile = $_FILES['main_image'];
        if($avatarFile['size'] > 0){
            $filename = uniqid() . '-' . $avatarFile['name'];
            move_uploaded_file($avatarFile['tmp_name'], './public/uploads/products/' . $filename);
            $filename = "public/uploads/products/" . $filename;
        }
      $product->main_image = $filename;
      $product->fill($_POST);//có lẽ là dữ liệu được nạp vào phải là dưới dạng mảng
      $product->save();
      
      header('location: list-product');die;
    }//
    //Side user.
    public function listProduct_client() {
      $products = Product::all();
      $this->render('product.listClient', compact('products')); 
    }
    public function detailProduct() {
      $id = $_GET['id'];
      $product = Product::find($id);
      $this->render('product.detailProduct', compact('product'));
    }
  }
?>