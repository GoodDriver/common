<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="/jquery-1.8.3.min.js"></script>
</head>
		<body>

		<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
		<div class="container">
		<form action="/articles/insert" method="post">
		  {{ csrf_field() }}
		                <input type="text" class="form-control" name="title" placeholder="click here to input the title" style="margin-bottom: 20px;">
		     
		                <!-- 编辑器 -->
		                <div>
		                  <!-- Nav tabs -->
		                  <ul class="nav nav-tabs" role="tablist">
		                    <li role="presentation" class="active"><a href="#editTab" aria-controls="editTab" role="tab" data-toggle="tab">编辑</a></li>
		                    <li role="presentation"><a href="#previewTab" aria-controls="previewTab" role="tab" data-toggle="tab" id="previewButton">阅览</a></li>
		                  </ul>
		​
		                  <!-- Tab panes -->
		                  <div class="tab-content">
		                    <div role="tabpanel" class="tab-pane active" id="editTab">
		                        <textarea class="z-textarea" name="content" rows="20" style="width:100%;"></textarea>
		                    </div>
		                    <div role="tabpanel" class="tab-pane" id="previewTab">
		                        <div class="z-textarea-preview markdown">
                            Preview
                        </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
​</div>
                
		</form>
		<script type="text/javascript">
			// csrf token
			$.ajaxSetup({
			    headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
			});
			//Markdown AJAX ??
			$('#previewButton').click(function (){
			    //console.log($('.z-textarea').val())
			    $('.z-textarea-preview').html('loading...');
			    //AJAX ??
			    $.ajax({
			        url: "/articles/yulan",
			        type: "post",
			        data: {
			            content:$('.z-textarea').val()
			        },
			        success: function(res){
			            //console.log(res);
			            $('.z-textarea-preview').html(res);
			        },
			        error: function(err){
			            console.log(err.responseText);
			        }
			    });
			})
</script>
</body>
</html>