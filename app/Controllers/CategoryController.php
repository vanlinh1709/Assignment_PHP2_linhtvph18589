<?php
  //+Kết hợp với autoload để index.php tự động require file này khi class HomeController được gọi
  //+Vấn đề bị trùng tên phương thức được loại bỏ

  //Toàn bộ class, obj, const là không gian của App\Controllers
  namespace App\Controllers;
  
  use App\Models\Category;

  class CategoryController extends BaseController{
    //listCategory() trả về đoạn mã html(của view tương ứng) 
    //+ dữ liệu bên trong bảng categoriess(nhờ vào method bên models).
    
    public function listCategories() {
     
      $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
      if(empty($keyword)) {
        $categories = Category::all();
      } else {
        $categories = Category::where('name', 'like', "%$keyword%")->get();
      }

      // include './app/Views/categories/list.php';//đường dẫn phải tính từ file index.php
      $this->render('category.list', compact('keyword', 'categories'));
    }
    //Add new category
    public function categoryAddForm() {
      $this->render('category.add-form');
    }
    public function addNewCategory() {
      $model = new Category();
      $model->fill($_POST);
      $model->save();
      header("location: list-categories");die;
    }
    //
    public function delCategory() {
      $id = $_GET['id'];
      Category::destroy($id);
      header('location:list-categories');die;
    }
    //
    public function categoryEditForm() {
      //1. Ta cần lấy dữ liệu của category đang muốn sửa, đề chèn vào form edit
      $id = $_GET['id'];
      $category = Category::find($id);
      // echo '<pre>';
      // var_dump($category);
      //Vì trong category thì giá trị trong cột role_id là 1, 2, 3. Cho nên nếu ta muốn hiển thị "Nhân viên", "Quản lý"
      //lên form tà cần bảng Role có chứa cột định nghĩa cho các role_id: 1,2,3
      $this->render('category.edit-form', compact('category'));
    }
    public function saveEditCategory(){
      $id = $_GET['id'];
      $category = Category::find($id);
       
      $category->fill($_POST);//có lẽ là dữ liệu được nạp vào phải là dưới dạng mảng
      $category->save();
      header('location: list-categories');die;
    }//
  }
?>