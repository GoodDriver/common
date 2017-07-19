
<html lang="en">
<head>
<meta charset="UTF-8">
<title>登录</title>

<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
<script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/holder.js"></script>
<!DOCTYPE html>
</head>
<body>
<form method="POST" action="/auth/login">
        {!! csrf_field() !!}
                <div style="width: 300px;height: 300px;margin-left: 500px;">
                   <div class="form-group">
                    <label for="exampleInputEmail1">邮箱</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{ old('email') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" name="password">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    记住我<input type="checkbox"   name="remember">
                  </div>
                     <button type="submit" class="btn btn-default">登录</button>
                         <a href="/auth/register" style="font-size: 20px;margin-left: 100px;margin-top:100px;">注册</a>
                  </div>
            </form>

</body>
</html>
