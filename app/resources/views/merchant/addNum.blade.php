<?php include 'merchan/hear.blade.php' ?>
<style>
    .cnum{
        display: inline-block;
        width: 35px;
        font: 12px "Microsoft Yahei";
        background: #0ff;
    }
    
    .vnum{
        display: inline-block;
        width: 35px;
        font: 12px "Microsoft Yahei";
        background: yellow;
    }

</style>
       <!--个人信息-->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            机器信息 <small>添加闲置</small>
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
                            <form action="numadd" method="post">
                                <div class="table-responsive">
                                <input type="hidden" name="iid" value="{{ $iid }}">
                                    <h3>普通区</h3>
                                    <p>
                                    @for($i=1;$i <= $cnum;$i++)
                                        <span class='cnum'><input type="checkbox" 
                                        @if(in_array($i,$cnums))
                                             checked="checked" 
                                        @endif
                                         name="cnum[]" value="{{ $i }}"> {{ $i }}</span>
                                        @if( $i%8 == 0)
                                            </p><p>
                                        @endif
                                    @endfor
                                    </p>
                                </div>
                                <div class="table-responsive">
                                    <h3><b><font color="#f00">VIP区</font></b></h3>
                                    <p>
                                    <?php $a=1; ?>
                                    @for($i=$cnum+1;$i <= $cnum+$vnum;$i++)
                                        <span class='vnum'><input type="checkbox" 
                                        @if(in_array($i,$vnums))
                                             checked="checked" 
                                        @endif
                                         name="vnum[]" value="{{ $i }}"> {{ $i }}</span>
                                        @if( $a%8 == 0)
                                            </p><p>
                                        @endif
                                        <?php $a++; ?>
                                    @endfor
                                    </p>
                                </div>
                                <p>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="cnums" value="{{ $cnum }}">
                                    <input type="hidden" name="vnums" value="{{ $vnum }}">
                                    <input type="submit" value="确认">
                                </p>
                            </form>
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
    <script src="user/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="user/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="user/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="user/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="user/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>
