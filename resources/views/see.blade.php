<!DOCTYPE html>
<html lang="en">
<style>
	.pagination{
		margin-left: 450px;
	}
	.pagination li{
		list-style:none;
		float: left;
		padding: 10px;
	}
</style>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@foreach($res as $v)

	<img src="{{$v->path}}" alt="" style="height: 100px;width: 100px;">
	@endforeach
	<a href="/">返回主页</a>
	{!!$res->render()!!}
</body>
</html>