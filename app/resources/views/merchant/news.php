<?php include 'merchan/hear.blade.php' ?>
<script src="user/js/jquery.js"></script>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            入驻信息 <small></small>
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
                                    <form role="form" action="add" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <div class="form-group">
                                            <label>网吧名称</label>
                                            <input class="form-control" name="iname" placeholder="请填写网吧全称">
                                        </div>
                                        <div class="form-group">
                                            <label>网吧地址</label>
                                            <input class="form-control" name="address" placeholder="请填写详细地址">
                                        </div>
                                        <div class="form-group">
                                            <label>网吧负责人</label>
                                            <input class="form-control" name="boss" placeholder="请填写法定负责人">
                                        </div>
                                        <div class="form-group">
                                            <label>网吧联系</label>
                                            <input class="form-control" name="tel" placeholder="请填写11位手机号">
                                        </div>
                                        <div class="form-group">
                                            <label>全景图</label>
                                            <input type="file" name="log">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="submit" value="申请"/>
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
			<footer><p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p></footer>
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