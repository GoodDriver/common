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
		<form action="/articles/update" method="post">
		{{csrf_field()}}
		<div class="container" style="margin-top: 100px">
			<div class="col-md-5 col-md-offset-3">
				<form>				
				  <div class="form-group">
				    <label for="exampleInputEmail1">{{$res->title}}</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title" name="title" value="{{$res->title}}">
				  </div>
				  <input type="hidden" name="id" value="{{$res->id}}">
				 <div class="form-group">
				    <label for="exampleInputEmail1">内容</label>
					<textarea name="content" id="" cols="30" rows="10">{{$res->content}}</textarea>
				  </div>
				  <button type="submit" class="btn btn-default">提交</button>
				</form>
			</div>
		</div>
		</form>
</body>
</html>