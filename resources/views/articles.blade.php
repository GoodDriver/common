<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
		<body>
{{Session::get('info')}}
		<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
		<div class="container" style="margin-top: 100px">
			<div class="col-md-5 col-md-offset-3">
				<a href="/articles/insert" class="btn btn-info">添加文章</a>
				<table class="table table-striped">
					<tr>
					  <td class="active">发表人</td>
					  <td class="success">标题</td>
					  <td class="info">操作</td>
					</tr>
					@foreach($res as $v)
					<tr>
					  <td class="active">{{$v->name}}</td>
					  <td class="success">{{$v->title}}</td>
					  <td class="info"><a href="/articles/update?id={{$v->id}}" class="btn btn-info">修改</a>
						
						<a href="/articles/delete?id={{$v->id}}" class="btn btn-info">删除</a>
					  </td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
</body>
</html>