<!-- 引入头部文件 -->
<?php require_once "/user/header.php" ?>


        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            用户中心 <small>个人信息</small>
                        </h1>
                    </div>
                </div>
				
				
                <!-- /. ROW  -->
				
                <div class="row">
                    
                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                欢迎用户【 {{ $uname }} 】访问
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <p>头  像：<img src="{{ @'/'.$uphoto }}" width="90px" alt="头像"></p>
                                    <p>姓  名：{{ @$uname }}</p>
                                    <p>性  别：{{ @$sex }}</p>
                                    <p>邮  箱：{{ @$email }}</p>
                                    <p>身份证：{{ @substr_replace($IDcard, '****', 6,8) }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
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
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>