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
  <br><br>
  <hr>
</div>
        <div class="card">
            <div class="card-body">
                <table class = "table table-bordered"  border = "1">
                <thead>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Action</th>               
                </thead>

                <tbody>
                  <!-- $u là obj tương ướng với mỗi bản ghi -->
                  <?php foreach($categories as $u):?> 
                    <tr>
                      <td>{{ $u->id }}</td>
                      <td>{{ $u->name }}</td>
                      <td><a href="edit-category?id={{$u->id}}"><button class = "btn btn-info">Edit</button></a>
                          <a href="delete-category?id={{ $u->id }}"><button class = "btn btn-danger">Delete</button></a>
                    </td>       
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
        </div>
 
</div>

@endsection


