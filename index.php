
<?php
session_start();
const BASE_URL = 'http://localhost/codeClass/Asignmen_PHP2_linhtvph18589/mvc/';
  //index.php: Call các phương thức từ các class thuộc các file controllers.
  //vì thế nên cần phải require các file đó vào đây.
  require_once './vendor/autoload.php';

  //Thực hiện kết nối database.
  //Nạp thư viện illuminate/database: có class Model nới các hàm eloquent được định nghĩa 
  require_once './commons/db-config.php';

  //Đặt tên thay thế cho các class đã được setup namespace;
  //vd use App\Controllers\HomeController <=> use App\Controllers\HomeController as HomeController.
  require_once './commons/router.php';
  use App\Controllers\HomeController;

  //$url lấy ở đâu: Đọc readme.
  $url = !isset($_GET['url']) ? '/' : $_GET['url'];
  // switch ($url) {
  //   case '/':        
  //     break;
  //   case 'list-user': //tên của một số case sẽ tương ứng với yêu cầu của người dùng
  //     $ctr = new HomeController;
  //     $ctr -> listUser();
  //     break;
  //     // Thêm tài khoản     
  //   case 'add-new-user':
  //     $ctr = new HomeController;
  //     echo $ctr -> userAddForm();//Hàm trả về mã html của form add user
  //     break;
  //   case 'save-new-user':
  //     $ctr = new HomeController;
  //     echo $ctr -> addNewUser();//Hàm thực hiện việc add thông tin user vào database
  //     break;
  //     // 
  //   case 'delete-user':
  //     $ctr = new HomeController;
  //     echo $ctr -> delUser();
  //     break;

  //     // Chỉnh sửa thông tin tài khoản:
  //   case 'edit-infoUser':
  //     //trả về form chỉnh sửa người dùng.
  //     $ctr = new HomeController;
  //     echo $ctr -> userEditForm();
  //     break;
  //   case 'saveChangeInfoUser':
  //     $ctr = new HomeController();
  //     echo $ctr -> saveChangeInfoUser();
  //     break;
  //     //xóa tài khoản
  //   default:
  //     echo 'Đường dẫn không tồn tại!';
  //     break;
  // }
?>