﻿//打开字滑入效果
window.onload = function(){
	$(".connect p").eq(0).animate({"left":"0%"}, 600);
	$(".connect p").eq(1).animate({"left":"0%"}, 400);
};
//jquery.validate表单验证
$(document).ready(function(){
	//登陆表单验证
	$("#loginForm").validate({
		rules:{
			username:{
				required:true,//必填
				minlength:3, //最少3个字符
				maxlength:32,//最多20个字符
			},
			password:{
				required:true,
				minlength:3, 
				maxlength:32,
			},
		},
		//错误信息提示
		messages:{
			username:{
				required:"必须填写用户名",
				minlength:"用户名至少为3个字符",
				maxlength:"用户名至多为32个字符",
				remote: "用户名已存在",
			},
			password:{
				required:"必须填写密码",
				minlength:"密码至少为3个字符",
				maxlength:"密码至多为32个字符",
			},
		},

	});
	//注册表单验证
	$("#registerForm").validate({
		rules:{
			username:{
				required:true,//必填
				minlength:3, //最少3个字符
				maxlength:32,//最多20个字符
			},
			password:{
				required:true,
				minlength:3, 
				maxlength:32,
			},
			email:{
				required:true,
				email:true,
			},
			check_email:{
				required:true,
				rangelength:[4,4],
				digits:true,//整数
			},
			confirm_password:{
				required:true,
				minlength:3,
				equalTo:'.password'
			},
			phone_number:{
				required:true,
				phone_number:true,//自定义的规则
				digits:true,//整数
			}
		},
		//错误信息提示
		messages:{
			username:{
				required:"必须填写用户名",
				minlength:"用户名至少为3个字符",
				maxlength:"用户名至多为32个字符",
				remote: "用户名已存在",
			},
			password:{
				required:"必须填写密码",
				minlength:"密码至少为3个字符",
				maxlength:"密码至多为32个字符",
			},
			email:{
				required:"请输入邮箱地址",
				email: "请输入正确的email地址"
			},
			check_email:{
				required:"请输入邮箱验证码",
				rangelength:"请输入4位数字",
				digits:"请输入4位数字",
			},
			confirm_password:{
				required: "请再次输入密码",
				minlength: "确认密码不能少于3个字符",
				equalTo: "两次输入密码不一致",//与另一个元素相同
			},
			phone_number:{
				required:"请输入手机号码",
				digits:"请输入正确的手机号码",
			},
		
		},
	});
	//添加自定义验证规则
	jQuery.validator.addMethod("phone_number", function(value, element) { 
		var length = value.length; 
		var phone_number = /^(((13[0-9]{1})|(15[0-9]{1}))+\d{8})$/ 
		return this.optional(element) || (length == 11 && phone_number.test(value)); 
	}, "手机号码格式错误"); 

	//获取邮箱验证码
	$("#check_email").click(function(){
		//获取信息
		var email = $('.email').val();
		var csrf = $('#_token').val();
		var but = $(this);
		if(email == '')
		{
			but.val("请先输入邮箱");
		}
		else
		{
			but.attr('disabled',true);
			but.val("正在发送请等候。。。");
			//发送邮件
			$.post("check_email",{email:email,_token:csrf},function(msg){
				if(msg.success == 2)
				{	
					var _time = 60;
					var time_out = setInterval(function(){
						but.val("已发送，"+_time+"后可以重新发送");
						_time--;
						if(_time === 0)
						{
							but.val('重新发送');
							but.attr('disabled',false);
							clearInterval(_time);
						}
					},1000)
				}
				else
				{
					but.val('发送失败，请检查邮箱后重新发送');
					but.attr('disabled',false);
				}
			},'json');
		}
	});
});
