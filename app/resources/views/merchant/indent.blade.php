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
                                    <div>
                                        <input id="txtBeginDate" style="width:170px;padding:7px 10px;border:1px solid #ccc;margin-right:10px;"/>
                                        <input id="txtEndDate" style="width:170px;padding:7px 10px;border:1px solid #ccc;" />
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
                                        <td><?php if($v['status']==1){echo "订单过期";}elseif($v['status']=='0'){echo "<a href='xiaji?id=$v[id]'>下机？</a>";}else{echo "死活不付账";} ?></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $str->links() }}
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
<script>
    $(function () {
        $("#txtBeginDate").calendar({
            controlId: "divDate",                                 // 弹出的日期控件ID，默认: $(this).attr("id") + "Calendar"
            speed: 200,                                           // 三种预定速度之一的字符串("slow", "normal", or "fast")或表示动画时长的毫秒数值(如：1000),默认：200
            complement: true,                                     // 是否显示日期或年空白处的前后月的补充,默认：true
            readonly: true,                                       // 目标对象是否设为只读，默认：true
            upperLimit: new Date(),                               // 日期上限，默认：NaN(不限制)
            lowerLimit: new Date("2011/01/01"),                   // 日期下限，默认：NaN(不限制)
            callback: function () {                               // 点击选择日期后的回调函数
                alert("您选择的日期是：" + $("#txtBeginDate").val());
            }
        });
        $("#txtEndDate").calendar();
    });
</script>
