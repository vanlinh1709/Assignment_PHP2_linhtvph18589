<?php
  //+Kết hợp với autoload để index.php tự động require file này khi class HomeController được gọi
  //+Vấn đề bị trùng tên phương thức được loại bỏ

  //Toàn bộ class, obj, const là không gian của App\Controllers
  namespace App\Controllers;
  
  use App\Models\User;
  use App\Models\Role;
  class HomeController extends BaseController{
    //Side Client
    public function index_Client() {
      $this->render('layout.homeClient');
    }
   
    //listUser() trả về đoạn mã html(của view tương ứng) 
    //+ dữ liệu bên trong bảng users(nhờ vào method bên models).
    public function index() {
        $name = 'Foly';
        $hi = 'Welcom to ' . $name;
        $this->render('home.index', compact('hi'));
    }
    public function listUser() {
     
      $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
      if(empty($keyword)) {
        $users = User::all();
      } else {
        $users = User::where('name', 'like', "%$keyword%")->get();
      }

      // include './app/Views/user/list.php';//đường dẫn phải tính từ file index.php
      $this->render('user.list', compact('keyword', 'users'));
    }
    //Add new user
    public function userAddForm() {
      $role = Role::all();
      $this->render('user.add-form', compact('role'));
    }
    public function addNewUser() {
      $model = new User();
      $filename = "";
         $avatarFile = $_FILES['avatar'];
         if($avatarFile['size'] > 0){
             $filename = uniqid() . '-' . $avatarFile['name'];
             move_uploaded_file($avatarFile['tmp_name'], './public/uploads/avatars/' . $filename);
             $filename = "public/uploads/avatars/" . $filename;
         }
         // mã hóa mật khẩu.
        $model->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $model->avatar = $filename;
      $model->fill($_POST);
      $model->save();
      header("location: list-user");die;
    }
    //
    public function delUser() {
      $id = $_GET['id'];
      User::destroy($id);
      header('location:list-user');die;
    }
    //
    public function userEditForm() {
      //1. Ta cần lấy dữ liệu của user đang muốn sửa, đề chèn vào form edit
      $id = $_GET['id'];
      $user = User::find($id);
      // echo '<pre>';
      // var_dump($user);
      //Vì trong user thì giá trị trong cột role_id là 1, 2, 3. Cho nên nếu ta muốn hiển thị "Nhân viên", "Quản lý"
      //lên form tà cần bảng Role có chứa cột định nghĩa cho các role_id: 1,2,3
      $roles = Role::all();
      $this->render('user.edit-form', compact('user', 'roles'));
    }
    public function saveEditUser(){
      $id = $_GET['id'];
      $user = User::find($id);
       $filename = $user->avatar;
        $avatarFile = $_FILES['avatar'];
        if($avatarFile['size'] > 0){
            $filename = uniqid() . '-' . $avatarFile['name'];
            move_uploaded_file($avatarFile['tmp_name'], './public/uploads/avatars/' . $filename);
            $filename = "public/uploads/avatars/" . $filename;
        }
        $user->avatar = $filename;
      $user->fill($_POST);//có lẽ là dữ liệu được nạp vào phải là dưới dạng mảng
      $user->save();
      
      header('location: list-user');die;
    }//
  }
?>