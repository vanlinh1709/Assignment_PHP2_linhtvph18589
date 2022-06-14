@extends('layout.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<div class="row-sm">
  <div class="card card-primary">
    <div class="card-body">
      <!-- khi chuyển file thì phải có dòng enctype -->
      <form action="add-new-category" method = "post" enctype="multipart/form-data">
  Id: <input class="form-control" type="text" name="id" id=""><br>
  Name: <input class="form-control" type="" name="name" id=""><br> 
    <div class="text-center my-2" >
    <button class = "btn btn-info text-center" type="submit">Add Category</button>
    </div>
</form>
    </div>
</div>
</div>
@endsection
