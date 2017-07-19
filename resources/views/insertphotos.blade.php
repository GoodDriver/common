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
	      <div class="col-md-offset-3 col-md-6">
	            <form method="post"  enctype='multipart/form-data' action='/insertphotos'>
	            	{{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">名称</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">简介</label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="info">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputFile">上传封面</label>
			    <input type="file" id="exampleInputFile" name="cover">
			    <p class="help-block"></p>
			  </div>
			  <button type="submit" class="btn btn-default">上传</button>
		</form>
	     </div>
      </div>
      
</body>
</html>