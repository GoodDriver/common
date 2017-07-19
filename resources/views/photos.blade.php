<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
      <script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
      <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
      <div class="container">
            <a href="photo/insert" class="btn btn-info">添加影集</a>        
      </div>

  <div class="container" style="margin-top: 30px">
     @foreach($res as $v)
    <div class="col-md-3" style="height: 300px;">
     <a href="/file?id={{$v->id}}"><img src="{{$v->cover}}" alt="" style="height: 200px ;width: 200px;"></a> 
      <div>{{$v->name}}</div>
    </div>
  @endforeach
  </div>
  
</body>
</html>