<!-- 引入头部文件 -->
<?php require_once "user/header.php" ?>

        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            邀请好友 <small>送积分</small>
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
                                    <form role="form" method="post" action="invite_do" >
                                        <div class="form-group">
                                            <label>邀请人邮箱</label>
                                         <input class="form-control" id="name" name="uname[]" placeholder="请填写邮箱号" >
                                        </div>
                                        <div class="div"></div>
                                        <div class="form-group">
                                            <label>添加一个</label>
                                            <input name="IDcard" id="button" type="button"  value="+">
                                            <span id="check_id"></span>
                                        </div>
                                        <input type="hidden" name="id" value="{{ Session::get('uid') }}"/>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-default" id="btn" value="确认邀请">
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
</body>
</html>
<script>

    $(function(){
        var num=0;
        $("#button").click(function(){
            num=num+1;

            var str="";
            //str+="<div>"
            str+='<div class="form-group">';
            str+='<label>邀请人邮箱</label>'
            str+='<input class="form-control" id="name" name="uname[]" placeholder="请填写邮箱号" >';
            str+='</div>';

            //str+="</div>"


            $('.div').append(str);
            //$(".table").html(str)
        })
    })
</script>

