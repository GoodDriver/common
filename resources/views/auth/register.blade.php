
<html lang="en">
<head>
<meta charset="UTF-8">
<title>注册</title>

<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
<script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/holder.js"></script>
<!DOCTYPE html>
</head>
<body>
  <form method="POST" action="/auth/register">
        {!! csrf_field() !!}
                <div style="width: 300px;height: 300px;margin-left: 500px;">
                  <div class="form-group">
                    <label for="exampleInputEmail1">用户名</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="username"  name="name" value="{{ old('name') }}">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">邮箱</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputPassword1">确认密码</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_confirmation">
                  </div>
                     <button type="submit" class="btn btn-default">注册</button>
                  </div>
            </form>
</body>
</html>
