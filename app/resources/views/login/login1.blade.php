<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
</head>
<body>
	<center>
		<form action="login_do" method="post"> 
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<table>
				<tr>
					<td>账号：</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="password" name="password" ></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2"><input type="submit" value="登录"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>