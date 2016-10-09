<!-- 引入头部文件 -->
<?php require_once "/user/header.php" ?>

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
                                    <form role="form" method="post" action="info" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>真实姓名</label>
                                            <input class="form-control" name="uname" placeholder="请填写您的真实姓名" value="{{ @$uname }}">
                                        </div>
                                        <div class="form-group">
                                            <label>身份证</label>
                                            <input name="IDcard" class="form-control" placeholder="必须为国家二代省份证"  value="{{ @$IDcard }}">
                                        </div>
                                        <div class="form-group">
                                            <label>邮箱</label>
                                            <input name="email" class="form-control" placeholder="常用邮箱"  value="{{ @$email }}">
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
                                        <button type="submit" class="btn btn-default">确认修改</button>
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
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>
