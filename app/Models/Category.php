<?php
  //Định nghĩa các method sử dụng để làm việc với table users trong database
  namespace App\Models;

  //Các method này đã được định nghĩa sẵn trong class Model.
  use Illuminate\Database\Eloquent\Model;//Nhớ câu lệnh không require class Model.

  class Category extends Model{
    //Ta chỉ chỉnh sửa một số thuộc tính sao để phù hợp với class con là user.
    protected $table = 'categories';
    public $timestamps = false;//Trong bảng users ta không tạo 2 bảng create_at và update_at
    //thuộc tính này định dạng các bảng có thể điền vào.
    protected $fillable = [
      'name'];
  }

?>