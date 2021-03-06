@extends('layout.main')
@section('title', "Tạo mới tài khoản")
@section('content')

<div class="row-sm">
  <div class="card card-primary">

    <form class = "form" action = "edit-user?id=<?=$user->id?>" method = "post" enctype="multipart/form-data">
        <div class = "card-body">
          <div class = "form-group">Name: <input class="form-control" type ="text" name ="name" value ="<?= $user->name?>" ></div>
          <div class = "form-group">Email: <input class="form-control" type ="email" name ="email" value ="<?= $user->email?>" ></div>
          <div class = "form-group">Phone Number: <input class="form-control" type ="text" name ="phone_number" value ="<?= $user->phone_number?>" ></div>
          <div class="col-6 offset-3">
                                    <img src="{{BASE_URL . $user->avatar}}" class="img-thumbnail">
                                </div>
          <div class="form-group">
                        <label for="">Avatar </label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
          <div class = "form-group">Role:<select class = "form-control" name = "role_id">
                          <?php foreach($roles as $r): ?>
                            <option <?php if($r->id == $user->role_id) echo 'selected'?> value = "<?= $r->id?>"><?=$r->name?></option>
                          <?php endforeach?>
                    </select>
          </div>
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
