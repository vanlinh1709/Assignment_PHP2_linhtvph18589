@extends('layout.main')
@section('title', "Tạo mới tài khoản")
@section('content')


<div class="row-2">
   <div class="row">
  <div class="col-sm">
    <form action="" method = "get">
  <input type="text" name="keyword" value = "{{$keyword}}">
  <button class = "btn-info" type = "submit">Tìm kiếm</button> 
  </form> 
</div>
<div class="col-sm">
<a href="add-new-category"><button class = "btn-danger mx-3" type = "submit">Add new Category</button> </a>
  </div>
</div>
  <br><br>
  <hr>
        <div class="card">

            <div class="card-body">
                <table class = "table table-bordered"  border = "1">
                <thead>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Avatar</th>
                  <th>Role</th>
                </thead>

                <tbody>
                  <!-- $u là obj tương ướng với mỗi bản ghi -->
                  <?php foreach($users as $u):?> 
                    <tr>
                      <td>{{ $u->id }}</td>
                      <td>{{ $u->name }}</td>
                      <td>{{ $u->email }}</td>
                      <td>{{ $u->phone_number }}</td>
                      <td><img src="{{ BASE_URL . $u->avatar}}" width="70"></td>
    
                      <td>{{ $u->role_id }}</td>
                      <td><a href="delete-user?id={{ $u->id }}">Delete</a></td>
                      <td><a href="edit-user?id={{$u->id}}">Edit</a></td>       
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
        </div>
 
</div>

@endsection