<?php include 'merchan/hear.blade.php' ?>
<!--个人信息-->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    网吧价格 <small>
                        <?php if($list== ""){?>
                            <a href="pricelist"><input class="form-control" type="button" value="首次录入"/></a>
                        <?php }else if($list != ""){?>
                        <a href="prupdates"><input class="form-control" type="button" value="修改"/></a>
                        <?php }?>
                    </small>
                </h1>
            </div>
        </div>
        <div class="row">


                <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" >
                           <h4>目前本系统只支持VIP区和非VIP区，如有不便，敬请谅解！谢谢！</h4>
                            <table class="table">
                                <p>V I P 价 格：<b>{{ @$list['vip'] }}元</b></p>
                                <p>普通区价格：<b>{{ @$list['ordinary'] }}元</b></p>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- End  Basic Table  -->
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
