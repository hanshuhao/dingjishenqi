<!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>login</title>

<link rel="stylesheet" href="css/style.css">
<style>
	a { text-decoration: none; color: #ffffff }
</style>
<body>

<div class="login-container">
	<h1><a href="/">订机神器</a></h1>
	
	<div class="connect">
		<p>djsq.qlh6.cn</p>
	</div>
	
	<form action="pass_do" method="post">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

		<div>
			<input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
		</div>
		<div>
			<input type="email" name="email" class="email" placeholder="邮箱" />
		</div>
		<button id="submit" type="submit">确定</button>
	</form>

	<a href="welcome">
		<button type="button" class="register-tis">登 陆</button>
	</a><br>
	<a href="register">
		<button type="button" class="register-tis">还有没有账号？</button>
	</a>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<!--背景图片自动更换-->
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init.js"></script>
<!--表单验证-->
<script src="js/jquery.validate.min.js?var1.14.0"></script>

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用三组浏览器和服务器，引用前声明版权。</p>
<p>来源：<a href="http://djsq.qlh6.cn/" target="_blank">定机神器</a></p>
</div>
</body>
</html>