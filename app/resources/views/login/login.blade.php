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
		<p>djsq.qlh6.com</p>
	</div>
	
	<form action="login_do" method="post" id="loginForm">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div>
			<input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<button id="submit" type="submit">登 陆</button>
	</form>

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
<p>来源：<a href="http://sc.chinaz.com/" target="_blank">LowB</a></p>
</div>
</body>
</html>