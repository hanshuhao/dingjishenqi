<!-- /. NAV SIDE  -->
<?php include 'merchan/hear.blade.php' ?>
<link href="css/lyz.calendar.css" rel="stylesheet" type="text/css" />
<script src="http://libs.baidu.com/jquery/1.5.2/jquery.min.js"></script>
<script src="js/lyz.calendar.min.js" type="text/javascript"></script>
<style>
    body {
        font-size: 12px;
        font-family: "微软雅黑", "宋体", "Arial Narrow";
    }
</style>
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
                                    <div class="form-group">
                                            <label>日期搜索</label>
                                            <input type="text" class="form-control" id="datepicker" name="addtime" onblur="peo()" name="boss" placeholder="请填写"><span id="check_people"></span>
                                        </div>
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
                                    <tbody id="tr">
                                   @foreach($str as $v)
                                    <tr class="odd gradeX">
                                        <td>{{ $v['l_num'] }}</td>
                                        <td><b>{{ $v['c_num'] }}</b> 号</td>
                                        <td>{{ $v['username'] }}</td>
                                        <td>{{ $v['IDcard'] }}</td>
                                        <td>{{ date('Y-m-d H:i:s',$v['on_time']) }}</td>
                                        <td>{{ date('Y-m-d H:i:s',$v['down_time']) }}</td>
                                        <td class="center">{{ $v['money'] }} ￥</td>
                                        <td><?php if($v['status']==1){echo "订单过期";}elseif($v['status']=='0'){echo "<a href='xiaji?id=$v[id]'>下机？</a>";}else{echo "死活不付账";} ?></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div id="a">
                                {{ $str->links() }}
                                </div>
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
<link rel="stylesheet" href="date/jquery-ui.css">
  <script src="js/jq.js"></script>
  <script src="date/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
     $("#datepicker").click(function(){
            var times=$(this).val()
             $.get("so", { times: times },function(msg){
                 $('#tr').html(msg)
                 $('#a').html("")
             })
        })
  });
  </script>
<script>
    // $(document).ready(function () 
    //     $('#dataTables-example').dataTable();
    // });
</script>
<!-- Custom Js -->
<script src="user/assets/js/custom-scripts.js"></script>


</body>
</html>