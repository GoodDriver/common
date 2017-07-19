<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
	{{Session::get('info')}}
</head>
<body>
		<div class="container" style="margin-top: 100px">
			<table class="table table-hover">
				<tr>
				  <td class="active">id</td>
				  <td class="success">名称</td>
				  <td class="warning">父级分类名称</td>
				
				    <td class="danger">操作</td>
				</tr>
				@foreach($cate as $v)
				<tr>
				  <td class="active">{{$v->id}}</td>
				  <td class="success">{{$v->name}}</td>
				  <td class="warning">{{getname($v->pid)}}</td>
				  <td class="info"><a href="/cate/delete?id={{$v->id}}" class="btn btn-danger">删除</a></td>
				</tr>
				@endforeach
			</table>
		</div>
</body>
</html>