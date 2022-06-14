@extends('layout.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<div class="row-sm">
  <div class="card card-primary">
    <div class="card-body">
      <!-- khi chuyển file thì phải có dòng enctype -->
      <form action="add-new-product" method = "post" enctype="multipart/form-data">
  Name: <input class="form-control" type="text" name="name" id=""><br>
  Category Id: <input class="form-control" type="" name="category_id" id=""><br>
  <div class="form-group">
                        <label for="">Image </label>
                        <input type="file" name="main_image" class="form-control">
                    </div>
  Price: <input class="form-control" type="text" name="price" id=""><br>
  Detail: <input class="form-control" type="text" name="detail" id=""><br>
  Promotion: <input class="form-control" type="text" name="promotion" id=""><br>


    <div class="text-center my-2" >
    <button class = "btn btn-info text-center" type="submit">Add Product</button>


    </div>
</form>
    </div>

</div>
</div>
@endsection
