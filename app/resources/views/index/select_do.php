<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <!-- Bootstrap Styles-->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
</head>
<style>
    .table{
        text-align: center;
        width: 50%;
        margin-top:70px;
    }
    .radio{
        display: inline;
    }
    .h2{
        margin-top:30px;
    }
    #submit{
        width: 20%;
    }
</style>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index"><i class="fa fa-comments"></i> <strong>定机神器 </strong></a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                              <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                            </div>
                            <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">28% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                        <span class="sr-only">28% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="index"><i class="fa fa-user fa-fw"></i> {{ $username }}</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> 退出登录</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
            </ul>
        </div>
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        网吧·~ <small>网吧订机</small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                    <div class="panel panel-default">
                       <center> <h2 class="h2"><?php echo $list['iname']?></h2></center>
                                <form action="account" method="post">
                                    <center>
                                        <input type="hidden" name="id" id="id" value="<?php echo $list['id']?>"/>
                                        <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <input type="radio" name="radio" checked class="radio" value="2"/>普通区
                                                </td>
                                                <td>
                                                    <input type="radio" name="radio" class="radio" value="1"/>VIP区<br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>上机时间</td>
                                                <td>
                                                    <select name="times" id="times">
                                                        <option value="0">请选择</option>
                                                        <option value="1">一小时</option>
                                                        <option value="2">两小时</option>
                                                        <option value="3">三小时</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">所需押金：<span id="span2" name="money"></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit"  value="立即付款" id="submit"/></td>
                                            </tr>
                                        </table>
                                            <p class="colorp00">
                                            <input type="hidden" name="money" id="money"/>
                                            </p>
                                        <!--<a href="" class="YImmediatelyininstallment">立即付款</a>-->
                                    </center>
                                </form>
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
<script src="/assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="/assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="/assets/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="/assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="/assets/js/morris/morris.js"></script>
<script src="/assets/js/easypiechart.js"></script>
<script src="/assets/js/easypiechart-data.js"></script>
<!-- Custom Js -->
<script src="/assets/js/custom-scripts.js"></script>
<script src="js/jquery.js"></script>
<script>
    $(function(){


        $(document).ready(function(){
            var num=$("#times").val();
            var id=$("#id").val()
            var radio=$(".radio:checked").val();
            var _token = $('#_token').val();
            if(num=="0"){
                //alert("请填写所上小时数")
                $('#submit').attr('disabled',true);
            }else{
                $.post("money", { radio: radio, times: num ,id:id , _token:_token} ,function(msg){
                    $("#span2").html(msg)
                    $("#money").val(msg)
                    if(msg==0){
                        $('#submit').attr('disabled',true);
                    }else{
                        $('#submit').attr('disabled',false);
                    }

                });
            }

        });

            $("#times").change(function(){
            var num=$(this).val()
            var id=$("#id").val()
            var radio=$(".radio:checked").val();
            var _token = $('#_token').val();
            if(num=="0"){
                alert("请填写所上小时数")
            }
            $.post("money", { radio: radio, times: num ,id:id , _token:_token} ,function(msg){
                $("#span2").html(msg)
                $("#money").val(msg)
                if(msg==0){
                    $('#submit').attr('disabled',true);
                }else{
                    $('#submit').attr('disabled',false);
                }

            });
        })

        $(".radio").change(function(){

            var num=$("#times").val()
            var id=$("#id").val()
            var radio=$(".radio:checked").val();
            var _token = $('#_token').val();
            if(num=="0"){
                alert("请填写所上小时数")
            }
            $.post("money", { radio: radio, times: num ,id:id , _token:_token} ,function(msg){
                $("#span2").html(msg)
                $("#money").val(msg)
                if(msg==0){
                    $('#submit').attr('disabled',true);
                }else{
                    $('#submit').attr('disabled',false);
                }
            });
        })
    })
</script>
</body>

</html>