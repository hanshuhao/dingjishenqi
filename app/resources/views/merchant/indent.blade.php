<!-- /. NAV SIDE  -->
<?php include 'merchan/hear.blade.php' ?>
<!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        定机历史 <small>上机信息</small>
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
                                        <th>订单号</th>
                                        <th>机器号</th>
                                        <th>姓名</th>
                                        <th>身份证号</th>
                                        <th>上机时间</th>
                                        <th>下机时间</th>
                                        <th>消费金额</th>
                                        <th>订单状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($str as $v)
                                    <tr class="odd gradeX">
                                        <td>{{ $v['l_num'] }}</td>
                                        <td><b>{{ $v['c_num'] }}</b> 号</td>
                                        <td>{{ $v['username'] }}</td>
                                        <td>{{ $v['IDcard'] }}</td>
                                        <td>{{ date('Y-m-d H:i:s',$v['on_time']) }}</td>
                                        <td>{{ date('Y-m-d H:i:s',$v['down_time']) }}</td>
                                        <td class="center">{{ $v['money'] }} ￥</td>
                                        <td><?php if($v['status']==1){echo "订单过期";}else{echo "<a href='xiaji?id=$v[id]'>下机？</a>";} ?></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
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

