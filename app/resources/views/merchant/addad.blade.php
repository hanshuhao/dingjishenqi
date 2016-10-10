<?php include 'merchan/hear.blade.php' ?>
<script src="js/jquery.js"></script>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            商户广告信息添加 <small></small>
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
                                    <form role="form" action="addinto" onsubmit="return sub()" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="hidden" name="id" value="<?php echo @$id ?>"/>
                                        <div class="form-group">
                                            <label>网吧名称</label>
                                            <input class="form-control" id="wname"   onblur="check()" readonly="readonly" value="<?php echo @$iname ?>" placeholder="请填写网吧全称"><span id="check_name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>网吧广告</label>
                                            <textarea class="form-control" name="addtext" id="adre" onblur="ad()" placeholder="请填写"></textarea> <span id="check_adre"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>广告添加人</label>
                                            <input class="form-control" id="people" name="addname" onblur="peo()" name="boss" placeholder="请填写"><span id="check_people"></span>
                                        </div>
                                       <div class="form-group">
                                            <label>广告显示日期</label>
                                            <input type="text" class="form-control" id="datepicker" name="addtime" onblur="peo()" name="boss" placeholder="请填写"><span id="check_people"></span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="submit" value="添加广告"/>
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
    <link rel="stylesheet" href="date/jquery-ui.css">
  <script src="js/jq.js"></script>
  <script src="date/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
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

        var reg= /^([a-zA-Z0-9\u4e00-\u9fa5\·]{10,100})$/;
 
        var check=document.getElementById('check_adre');
        if(name==""){
            check.innerHTML="<font color='red'>不能为空<font>";
            return false;
        }
        if(!reg.exec(name)){
            check.innerHTML="<font color='red'>广告字数超过10</font>";
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
    

    function sub(){
        if(no()&check()&vi())
        {
            return true;
        }else{
            return false;
        }
    }
</script>