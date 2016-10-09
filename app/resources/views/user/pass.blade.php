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
                        <form role="form" method="post" action="passsave">
                            <div class="form-group">
                                <label>账号</label>
                                <input class="form-control" name="uname" value="{{ $username }}">
                            </div>
                            <div class="form-group">
                                <label>原密码</label>
                                <input name="oldpass" class="form-control" placeholder="请输入原密码">
                            </div>
                            <div class="form-group">
                                <label>新密码</label>
                                <input type="password" name="newpass" class="form-control" placeholder="请输入新密码">
                            </div>
                            <div class="form-group">
                                <label>确认新密码</label>
                                <input type="password" name="qpass" class="form-control" placeholder="请确认新密码">
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
