<!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>定机神器FOR WEB</title>
<link rel="stylesheet" href="css/jquery-labelauty.css">
<link rel="stylesheet" href="css/style.css">
<style>
ul { list-style-type: none;}
li { display: inline-block;}
li { margin: 10px 0;}
input.labelauty + label { font: 12px "Microsoft Yahei";}
a { text-decoration: none; color: #ffffff}
</style>


<body>

<div class="register-container">
	<h1><a href="/">定机神器</a></h1>
	 
	<div class="connect">
		<p>djsq.qlh6.cn</p>
	</div>
	
	<form action="password_save" method="post" id="registerForm">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<input type="hidden" name="id" value="{{ $id }}">
		<div>
			<input type="password" name="password" class="password" placeholder="请输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="password" name="confirm_password" class="confirm_password" placeholder="请再次输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<input type="submit" value="确认修改" style="background:blue">
	</form>
	<a href="welcome">
		<button type="button" class="register-tis">返回登陆</button>
	</a>
</div>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<!--背景图片自动更换-->
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init.js"></script>
<!--表单验证-->
<script src="js/jquery.validate.min.js?var1.14.0"></script>
</html>

<script src="js/jquery-labelauty.js"></script>
<script>
$(function(){
	$(':input').labelauty();
});
</script>