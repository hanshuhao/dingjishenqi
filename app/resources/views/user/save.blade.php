<!-- 引入头部文件 -->
<?php require_once "user/header.php" ?>

        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            个人信息 <small>修改信息</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            填写信息
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" onsubmit="return sub()" action="info" enctype="multipart/form-data">
                <div class="form-group">
                    <label>真实姓名</label>
                 <input class="form-control" id="name" name="uname" placeholder="请填写您的真实姓名" onblur="check()" value="{{ @$uname }}"><span id='check_name'></span>
                </div>
                                        <div class="form-group">
                                            <label>省份证</label>
                                            <input name="IDcard" id="idcard" onblur="card()" class="form-control" placeholder="必须为国家二代省份证"  value="{{ @$IDcard }}">
                                            <span id="check_id"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>邮箱</label>
                                            <input name="email" class="form-control" placeholder="常用邮箱" id="gell" onblur="gells(this)"  value="{{ @$email }}">
                                            <span id="check_gell"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>上传头像</label>
                                            <input type="file" name="myfile">
                                        </div>
                                        <div class="form-group">
                                            <label>性别：</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" id="optionsRadiosInline1" value="男" checked>男
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" id="optionsRadiosInline2" value="女">女
                                            </label>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-default" id="btn" value="确认修改">
                                        <button type="reset" class="btn btn-default">重置</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
</body>
</html>
<script type="text/javascript">        
       /*
       验证姓名
        */
       
    function check(){
        var name=document.getElementById('name').value;
        var reg=/^[\u4e00-\u9fa5]{3,10}$/;
        var check=document.getElementById('check_name');
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(reg.test(name)){
            check.innerHTML="<font color='green'>√</font>"; return true;
        }else{
            check.innerHTML="<font color='red'>必须是三个中文名字以上</font>";
            return false;
        }
    }
     function card(){
        var idcard=document.getElementById('idcard').value;
        var check=document.getElementById('check_id');
        var reg=/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/; 
        if(idcard==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(reg.test(idcard)){
            check.innerHTML="<font color='green'>√</font>"; return true;
        }else{
            check.innerHTML="<font color='red'>身份证格式错误</font>";
            return false;
        }

    }
     function gells(obj){
        var gell=obj.value;
        var check=document.getElementById('check_gell');
        var reg=/^[a-z0-9]{1,}\@qq\.com$/;
        if(gell==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(reg.test(gell)){
            check.innerHTML="<font color='green'>√</font>"; return true;
        }else{
            check.innerHTML="<font color='red'>邮箱格式错误</font>";
            return false;
        }

    }
    

    function sub(){
        if(gells(document.getElementById('gell'))&check()&card())
        {
            return true;
        }else{
            return false;
        }
    }


</script>
