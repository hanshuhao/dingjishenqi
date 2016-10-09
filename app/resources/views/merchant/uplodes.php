<?php include 'merchan/hear.blade.php' ?>
<script src="js/jquery.js"></script>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            商户信息修改 <small></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="uplodes_do" onsubmit="return sub()" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="hidden" name="id" value="<?php echo @$id ?>"/>
                                        <div class="form-group">
                                            <label>网吧名称</label>
                                            <input class="form-control" id="wname" name="iname"  onblur="check()" value="<?php echo @$iname ?>" placeholder="请填写网吧全称"><span id="check_name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>网吧地址</label>
                                            <input class="form-control" name="address" id="adre" onblur="ad()" value="<?php echo @$address ?>" placeholder="请填写详细地址"><span id="check_adre"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>网吧负责人</label>
                                            <input class="form-control" id="people" onblur="peo()" name="boss" value="<?php echo @$boss ?>" placeholder="请填写法定负责人"><span id="check_people"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>网吧联系</label>
                                            <input class="form-control" id="call" onblur="cal()" name="tel" value="<?php echo @$tel ?>" placeholder="请填写11位手机号"><span id="check_call"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>VIP区机器数量</label>
                                            <input class="form-control" id="vip" onblur="vi()" name="vnum"  value="<?php echo @$vnum ?>" placeholder="请填写数字"><span id="check_vip"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>普通区机器数量</label>
                                            <input class="form-control" id="now" onblur="no()" name="cnum"  value="<?php echo @$cnum ?>" placeholder="请填写数字"><span id="check_now"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>全景图</label>
                                            <input type="file" name="log"><img src="<?php echo @$log ?>" width="96%" height="340" alt=""/>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="submit" value="修改"/>
                                        </div>
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
    <script src="user/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="user/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="user/assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="user/assets/js/custom-scripts.js"></script>
</body>
</html>
<script type="text/javascript">

/*
验证网吧名称
 */
       
    function check(){
        var name=document.getElementById('wname').value;

        var reg= /^([a-zA-Z0-9\u4e00-\u9fa5\·]{1,10})$/;
 
        var check=document.getElementById('check_name');
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(!reg.exec(name)){
            check.innerHTML="<font color='red'>中文名称或字母等（如：快乐网吧123）</font>";
            return false;
            
        }else{
            check.innerHTML="<font color='green'>√</font>"; return true;
            
        }
    }
      function ad(){
        var name=document.getElementById('adre').value;

        var reg= /^([a-zA-Z0-9\u4e00-\u9fa5\·]{4,20})$/;
 
        var check=document.getElementById('check_adre');
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(!reg.exec(name)){
            check.innerHTML="<font color='red'>地址详细（如：北京市海淀区XX街）</font>";
            return false;
            
        }else{
            check.innerHTML="<font color='green'>√</font>"; return true;
            
        }
    }
     function peo(){
        var name=document.getElementById('people').value;

        var reg= /^([\u4e00-\u9fa5\·]{2,6})$/;
 
        var check=document.getElementById('check_people');
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(!reg.exec(name)){
            check.innerHTML="<font color='red'>姓名不规范（如：张三）</font>";
            return false;
            
        }else{
            check.innerHTML="<font color='green'>√</font>"; return true;
            
        }
    }
     function cal(){
        var name=document.getElementById('call').value;

        var reg= /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/i;
 
        var check=document.getElementById('check_call');
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(!reg.exec(name)){
            check.innerHTML="<font color='red'>手机号为11位</font>";
            return false;
            
        }else{
            check.innerHTML="<font color='green'>√</font>"; return true;
            
        }
    }
     function vi(){
        var name=document.getElementById('vip').value;

        var reg= /^\d{1,4}$/i;
 
        var check=document.getElementById('check_vip');
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(!reg.exec(name)){
            check.innerHTML="<font color='red'>数字且合理</font>";
            return false;
            
        }else{
            check.innerHTML="<font color='green'>√</font>"; return true;
            
        }
    }
     function no(){
        var name=document.getElementById('now').value;

        var reg= /^\d{1,4}$/i;
 
        var check=document.getElementById('check_now');
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(!reg.exec(name)){
            check.innerHTML="<font color='red'>数字且合理</font>";
            return false;
            
        }else{
            check.innerHTML="<font color='green'>√</font>"; return true;
            
        }
    }

    function sub(){
        if(no()&check()&vi()&cal()&peo()&ad())
        {
            return true;
        }else{
            return false;
        }
    }
</script>