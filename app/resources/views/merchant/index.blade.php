<?php include 'merchan/hear.blade.php' ?>
       <!--个人信息-->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            商户信息 <small>
                                 <?php if($status == 0){?>
                                    <input class="form-control" type="button" value="正在审核"/>
                                <?php }else if($status == 1){?>
                                     <input class="form-control" type="button" value="审核成功"/>
                                    <?php }else if($status == -1){?>
                                     <a href=""><input class="form-control" type="button" value="未通过审核"/></a>
                                    <?php }else{?>
                                    <a href="news"><input class="form-control" type="button" value="申请入驻"/></a>
                                    <?php }?>
                                </small>
                        </h1>
                    </div>
                </div>
            <div class="row">

                <div class="col-md-6">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <p>网吧名称：<b>{{ @$iname }}</b></p>
                                    <p>网吧地址：<b>{{ @$address }}</b></p>
                                    <p>网吧负责人：<b>{{ @$boss }}</b></p>
                                    <p>联系方式：<b>{{ @$tel }}</b></p>
                                    <p>全景图：<img src="{{ @$log }}" width="300" height="280" alt=""/></p>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>
            </div>
        </div>

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>
