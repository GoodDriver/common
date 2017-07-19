<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
		<body>

		<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
		<div class="container" style="margin-top: 100px">
			<div class="col-md-3 col-md-offset-4">
			<form action="/cate/insert" method="post">
			{{csrf_field()}}
				分类名称<input type="text" class="form-control"  name="name">
				父级分类<select class="form-control" name="pid">
		  		<option value="0">请选择</option>
		  		@foreach($cate as $v)
		  			 <option value="{{$v->id}}">{{$v->name}}</option>
		  		@endforeach
				</select>
				  <button type="submit" class="btn btn-default" style="display: block;">确定 </button>
			</form>
			</div>
		</div>
</body>
</html>