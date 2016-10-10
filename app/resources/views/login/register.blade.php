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
	
	<form action="register_do" method="post" id="registerForm">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<div>
			<input type="text" name="username" class="username" placeholder="您的用户名" autocomplete="off"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="password" name="confirm_password" class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="text" name="phone_number" class="phone_number" placeholder="输入手机号码" autocomplete="off" id="number"/>
		</div>
		<div>
			<input type="email" name="email" class="email" placeholder="输入邮箱地址" oncontextmenu="return false" onpaste="return false" /><input type="button" value="获取验证码" id="check_email">
		</div>
		<div>
			<input type="text" name="check_email" class="check_email" placeholder="输入邮箱验证码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<ul class="dowebok">
				<li><input type="radio" name="type" data-labelauty="商家" value="2"></li>
				<li><input type="radio" name="type" data-labelauty="个人" checked="true" value="1"></li>
				<li><font color=red>*</font>请选择类型</li>
			</ul>
		</div>
		<input type="submit" value="注册" style="background:blue">
	</form>
	<a href="welcome">
		<button type="button" class="register-tis">已经有账号？</button>
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