<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>上传</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
      <script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
      <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="/file" method="post"  enctype='multipart/form-data'   >
	{{csrf_field()}}
		<input type="file" name="img[]" multiple>
		<!-- 用户名<input type="text" name="username"> -->
		<input type="hidden" value="{{$id}}" name="id">
		<input type="submit" value="提交">
	</form>
	
  <div class="container" style="margin-top: 50px">
     @foreach($res as $v)
    <div class="col-md-3" style="height: 100px;margin-top: 50px;">
   	 <img src="{{$v->src}}" alt="" style="height: 100px ;width: 100px; ">
    </div>
  @endforeach
  </div>
</body>
</html>
