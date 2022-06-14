@extends('layout.main')
@section('title', "Tạo mới tài khoản")
@section('content')

<div class="row-sm">
  <div class="card card-primary">

    <form class = "form" action = "edit-product?id=<?=$product->id?>" method = "post" enctype="multipart/form-data">
        <div class = "card-body">
          <div class = "form-group">Name: <input class="form-control" type ="text" name ="name" value ="<?= $product->name?>" ></div>
          <div class = "form-group">Category Id: <input class="form-control" type ="text" name ="category_id" value ="<?= $product->category_id?>" ></div>
          <div class = "form-group">Price: <input class="form-control" type ="text" name ="price" value ="<?= $product->price?>" ></div>
          <div class="col-6 offset-3">
                                    <img src="{{BASE_URL . $product->main_image}}" class="img-thumbnail">
                                </div>
          <div class="form-group">
                        <label for="">Image </label>
                        <input type="file" name="main_image" class="form-control">
                    </div>
                    <div class = "form-group">Detail: <input class="form-control" type ="text" name ="detail" value ="<?= $product->detail?>" ></div>
                    <div class = "form-group">Promotion: <input class="form-control" type ="text" name ="promotion" value ="<?= $product->promotion?>" ></div>

          <div>
            <div class="text-center">
            <button class = "btn btn-danger text-center" type = "submit">Update</button>

            </div>
          </div>
        </div>
</form>
</div>
</div>
@endsection
