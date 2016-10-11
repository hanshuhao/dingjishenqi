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
    #huifu{
        width: 100%;
        margin-top: 4px;
        border: 1px solid blue;
        display: none;
    }
    .d_hui{
        display: none;
    }
</style>
<!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        广告历史 <small>广告信息</small>
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
                                           
                                        </div>
                                    <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>广告内容</th>
                                        <th>投放人</th>
                                        
                                        <th>投放时间</th>
                                        <th>操作</th>
                                    
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($comment as $v)
                                    <tr class="odd gradeX">
                                        <td>{{ $v['cid'] }}</td>
                                        <td>{{ $v['username'] }}</td>
                                        <td>{{ $v['content'] }}</td>
                                        <td>{{ $v['c_time'] }}</td>
                                    <td><a href="">删除</a> | <a href="#" class="huifu" id="{{ $v['uid'] }}" cid="{{ $v['cid'] }}">回复</a></td>
                                    
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <input type="hidden" name="uid" value="1">
                                <input type="hidden" name="cid" value="1">
                                <textarea name="huifu" id="huifu" cols="30" rows="10"></textarea>
                                <button class="d_hui">回复</button>
                                
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
        $(".huifu").click(function(){
            var id = $(this).attr('id');
            var uid = $('input[name="uid"]');
            var cid = $(this).attr('cid');
            $('input[name="uid"]').val(id);
            $('input[name="cid"]').val(cid);


            if($("#huifu").css("display")=="none"){

            $("#huifu").show();
            $(".d_hui").show();
            }else{

            $("#huifu").hide();
            $(".d_hui").hide();
            }
        });

        $(".d_hui").click(function(){
            var uid = $('input[name="uid"]').val();
            var cid = $('input[name="cid"]').val();
            var content = $("#huifu").val();
            $.get("huifu_do",{uid:uid,content:content,cid:cid},function(obj){
                if(obj==1){
                    alert("回复成功");
                    $("#huifu").val("");
                    $("#huifu").hide();
                    $(".d_hui").hide();
                }else{
                    alert("回复失败");
                }
            })
        });
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