<!-- 引入头部文件 -->
<?php require_once "user/header.php" ?>

        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            VIP信息 <small>优惠信息</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             信息列表
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>等级</th>
                                            <th>升级条件</th>
                                            <th>身份标示</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $v)
                                        <tr class="odd gradeX">
                                            <td>{{ $v['id'] }}</td>
                                            <td><b>{{ $v['type'] }}</b></td>
                                            <td>您累计充值到{{ $v['max'] }}</td>
                                            <td>{{ $v['level'] }}</td>
                                        
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                      
                                </table>
                                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              
                                <thead>
                                  <th colspan="4">详细内容</th> 
                                        <tr>
                                            <th>级别</th>
                                         <th>标志</th>
                                            <th>升级</th>
                                            <th>优惠内容</th>
                                        </tr>
                                        <tr>
                                        <td>普通</td> 
                                         <th><img src="/images/1.png" height="50" width="50"></th>
                                        <td>免费加入，即刻成为普通会员</td>
                                        <td>不优惠</td>
                                       
                                        </tr>
                                        <tr>
                                        <td>白银</td>
                                        <th><img src="/images/2.png" height="50" width="50"></th>
                                        <td>充值累计2000定级积分获得或参加订机神器活动获得积分</td>
                                        <td>优惠10%</td>
                                        
                                        </tr>

                                        <tr>
                                        <td>黄金</td>
                                        <th><img src="/images/3.png" height="50" width="50"></th>
                                        <td>
                                         充值累计3000定级积分获得或参加订机神器活动获得积分</td>
                                        <td>优惠20%</td>
                                        
                                        </tr><tr>
                                        <td>钻石</td>
                                        <th><img src="/images/4.png" height="50" width="50"></th>
                                        <td>充值累计4000定级积分获得或参加订机神器活动获得积分</td>
                                        <td>优惠30%</td>
                                     
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               <footer><p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">定机神器</a></p></footer>
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
            // $(document).ready(function () {
            //     $('#dataTables-example').dataTable();
            // });
    </script>
         <!-- Custom Js -->
    <script src="user/assets/js/custom-scripts.js"></script>
    
   
</body>
</html>

