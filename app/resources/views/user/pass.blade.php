<!-- 引入头部文件 -->
<?php require_once "user/header.php" ?>

        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            修改密码 <small>请认真填写</small>
                        </h1>
                    </div>
                </div>
                    <!-- /. ROW  -->
            <div class="row">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post" onsubmit="return sub()" action="passsave">
                            <div class="form-group">
                                <label>账号</label>
                                <input class="form-control" name="uname" value="{{ $username }}"
                                readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label>原密码</label>
                                <input name="oldpass" class="form-control" onblur="up()" id="oldpass"  placeholder="请输入原密码">
                                <span id="check_old"></span>
                            </div>
                            <div class="form-group">
                                <label>新密码</label>
                                <input type="password" id="newpass" name="newpass" onblur="newpa()" class="form-control" placeholder="请输入新密码">
                                <span id="check_newpass"></span>
                            </div>
                            <div class="form-group">
                                <label>确认新密码</label>
                                <input type="password" onblur="twopa()" id="npass" name="qpass" class="form-control" placeholder="请确认新密码">
                                <span id="check_npass"></span>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-default">确认修改</button>
                            <button type="reset" class="btn btn-default">重置</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
                    <!-- /. ROW  -->
				<footer><p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">定机神器</a></p></footer>
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
<script type="text/javascript">
        /*
        ajax跨域请求验证
         $('#oldpass').onblur(function(){
             $.ajax({     
    url : "LoginAction",      
    type:"post",  
    dataType:"json",                                  
    data:"username="+userName,  
    timeout:20000,  
    success:function(){}  
  }); 
         }); */
function up(){
        var name=document.getElementById('oldpass').value;
        var check=document.getElementById('check_old');
        var get=/^[0-9a-z]{6,}$/i;
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(get.test(name)){
            check.innerHTML="<font color='green'>√</font>";
            return true;
        }else{
            check.innerHTML="<font color='red'>请认真填写</font>";
             return false;
        }
    }
function newpa(){
        var name=document.getElementById('newpass').value;
        var check=document.getElementById('check_newpass');
        var get=/^[0-9a-z]{6,}$/i;
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(get.test(name)){
            check.innerHTML="<font color='green'>√</font>"; return true;
        }else{
            check.innerHTML="<font color='red'>必须是6位以上的数字字母</font>";
             return false;
        }
    }
function twopa(){
    var npass=document.getElementById('npass').value;
    var check=document.getElementById('check_npass');
    var name=document.getElementById('newpass').value;
    if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
    if(npass==name){
        check.innerHTML="<font color='green'>√<font>"; return true;
    }else{
        check.innerHTML="<font color='red'>密码请一致</font>";
         return false;
    }
}

    function sub(){
        if(up()&newpa()&twopa())
        {
            return true;
        }else{
            return false;
        }
    }



</script>