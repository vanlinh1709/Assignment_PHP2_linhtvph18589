@extends('layout.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<form action="" method = "get">
  <input type="text" name="keyword" value = "{{$keyword}}">
  <button class = "btn-info" type = "submit">Tìm kiếm</button> 
  
</form>
<div class=""><a href="add-new-product"><button class = "btn-danger mx-3" type = "submit">Add new Product</button> </a></div>

<div class="row">
   
        <div class="card">

            <div class="card-body">
                <table class = "table table-bordered"  border = "1">
                <thead>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Category Id</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Detail</th>
                  <th>Promotion</th>
                </thead>

                <tbody>
                  <!-- $u là obj tương ướng với mỗi bản ghi -->
                  <?php foreach($products as $u):?> 
                    <tr>
                      <td>{{ $u->id }}</td>
                      <td>{{ $u->name }}</td>
                      <td>{{ $u->category_id }}</td>
                      <td>{{ $u->price }}</td>
                      <td><img src="{{ BASE_URL . $u->main_image}}" width="70"></td>

                      <td>{{ $u->detail }}</td>
                      <td>{{ $u->promotion }}</td>
                      <td><a href="delete-product?id={{ $u->id }}">Delete</a></td>
                      <td><a href="edit-product?id={{$u->id}}">Edit</a></td>       
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
        </div>
 
</div>

@endsection