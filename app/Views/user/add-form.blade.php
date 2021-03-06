@extends('layout.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<div class="row-sm">
  <div class="card card-primary">
    <div class="card-body">
      <!-- khi chuyển file thì phải có dòng enctype -->
      <form action="add-new-user" method = "post" enctype="multipart/form-data">
  Name: <input class="form-control" type="text" name="name" id=""><br>
  Emai: <input class="form-control" type="email" name="email" id=""><br>
  <div class="form-group">
                        <label for="">Avatar </label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
  Phone: <input class="form-control" type="text" name="phone_number" id=""><br>
  Password: <input class="form-control" type="password" name="password" id=""><br>
  <div>
        Role: <select class = "form-control" name="role_id">
          <?php foreach($role as $r):?>           
                <option value="<?= $r->id?>"><?= $r->name?></option>
          <?php endforeach?>          
        </select>
    </div>
    <div class="text-center my-2" >
    <button class = "btn btn-info text-center" type="submit">Add User</button>


    </div>
</form>
    </div>

</div>
</div>
@endsection
