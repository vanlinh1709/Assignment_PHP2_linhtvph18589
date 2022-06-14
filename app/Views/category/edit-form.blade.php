@extends('layout.main')
@section('title', "Tạo mới tài khoản")
@section('content')

<div class="row-sm">
  <div class="card card-primary">

    <form class = "form" action = "edit-category?id=<?=$category->id?>" method = "post" enctype="multipart/form-data">
        <div class = "card-body">
          <div class = "form-group">Name: <input class="form-control" type ="text" name ="name" value ="<?= $category->name?>" ></div>
          
            <div class="text-center">
            <button class = "btn btn-danger text-center" type = "submit">Update</button>

            </div>
          </div>
        </div>
</form>
</div>
</div>
@endsection

