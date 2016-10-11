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
    <style>
        #content{
            margin-top: 5px;
            display: none;    
        }
        .ping{
            display: block;
            display: none;
            width: 104%;
            border: 1px solid blue;
            margin-top: 8px;
        }
        .zan{
            cursor: pointer;    
        }
        .p_zan{
            display: none;
        }
    </style>
</head>
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

                <li>
                    <a href="index"><i class="fa fa-dashboard"></i> 返回主页</a>
                </li>
                <li>
                    <a href="#"  class="active-menu"><i class="fa fa-qrcode"></i>网吧详情 </a>
                </li>
                <li>
                <?php $iid = Session::get('iid'); ?>
                    <a href="comment_show?id={{ $iid }}"><i class="fa fa-qrcode"></i>网吧评论 </a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">


            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        <input type="hidden" value="0" name="cc">
                        网吧详情 <small>网吧信息</small> 
                        <center>(<span class="zan_num">{{ @$zan }}</span>)<img src="images/zan.png" alt="赞" width="6%;" class="zan"><span class="p_zan">+1</span></center> 
                        
                    </h1>
                </div>
            </div>


            <!-- /. ROW  -->

            <div class="row">

                <div class="col-md-8 col-sm-12 col-xs-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            欢迎用户【 {{ $username }} 】访问
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <p>网吧名称：{{ @$iname }}</p>
                                <p>网吧地址：{{ @$address }}</p>
                                <p>剩余机子：<span id="span">{{ @$c }}台</span></p>
                                <p>联系方式：{{ @$tel }}</p>
                                <p>网吧全景图：<img src="{{@$log}}" alt="" style="width:80%"/></p>
                                <form action="select_do" method="post">
                                    <input type="hidden" name="iid"  value="{{@$id}}"/>
                                    <input type="submit" id="button" class="form-control" value="订购机器"/>
                                </form>
                            </div>
                        </div>
                    </div>
                        <center><small><button class="comment">点击打开评论之旅~</button></small></center>
                        <textarea name="content" id="content" cols="100" rows="8"></textarea>
                        <center><a href="javascript:void(0)" class="ping">评论</a></center>
                        
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="iid" value="{{ $id }}">
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
        var num=$("#span").html()
        if(num=="0台"){
            $("#span").html("暂无")
            $("#button").attr("disabled",true)
        }


        $('.comment').click(function(){
            var cc = $('input[name="cc"]');
            if(cc.val()==1){
                $('#content').show('slow');
                $('.ping').show('slow');
                cc.val('0');
            }else{
                $('#content').hide('slow');
                $('.ping').hide('slow');
                cc.val('1');
            }
        });

        $('.ping').click(function(){
            var iid = $('input[name="iid"]').val();
            var content = $('#content').val();
            $.ajax({
                type:'GET',
                url:"comment",
                data:{
                    iid : iid,
                    content : content,
                },
                success:function(obj){
                    if(obj==-1){
                        alert('请输入评论内容');
                    }else if(obj==1){
                        alert("评论成功");
                        $("#content").val("");
                    }else{
                        alert("评论失败");
                    }
                }
            });
        });

        //点赞
        $('.zan').click(function(){
            
            var iid = $('input[name="iid"]').val();
            $.get("dianzan",{iid:iid},function(obj){
                if(obj==1){
                    $(".p_zan").slideUp("fast");
                    $(".p_zan").slideDown("slow"); 
                    $(".p_zan").hide("slow");
                    var zan = $('.zan_num').html();
                    $('.zan_num').html(zan*1+1)
                }else if(obj==-1){
                    alert("每个人一天只能点一次赞，亲");
                }else{
                    alert("点赞失败");
                }
            })
        });


    })
</script>
</body>

</html>