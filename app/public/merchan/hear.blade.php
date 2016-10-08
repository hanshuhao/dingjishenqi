<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <!-- Bootstrap Styles-->
    <link href="user/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="user/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="user/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
   <!--  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
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
            <a class="navbar-brand" href="index"><i class="fa fa-comments"></i> <strong>定机神器</strong></a>
        </div>

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->


            <!-- /.个人中心 -->
            <!--<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user
            </li> -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="index"><i class="fa fa-user fa-fw"></i> <?php echo Session::get('uname')?></a>
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
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="merchant"><i class="fa fa-dashboard"></i> 商户信息</a>
                </li>
                <li>
                    <a href="uplodes"><i class="fa fa-bar-chart-o"></i>商户信息修改</a>
                </li>
                <li>
                    <a href="price"><i class="fa fa-bar-chart-o"></i>网吧价格</a>
                </li>
                <li>
                    <a href="indent"><i class="fa fa-desktop"></i>交易记录</a>
                </li>
                <li>
                    <a href="addNum"><i class="fa fa-desktop"></i>添加闲置机器</a>
                </li>
            </ul>

        </div>

    </nav>