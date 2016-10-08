<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>定机神器</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <!-- <link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">定机神器</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(!empty(Session::get('uname')))
                        @if(Session::get('type') == 1)
                        <li>
                            <a class="page-scroll" href="user/index">欢迎{{ Session::get('uname') }}，个人中心</a>
                        </li>
                        @elseif(Session::get('type') == 2)
                        <li>
                            <a class="page-scroll" href="merchant">欢迎{{ Session::get('uname') }}，商户中心</a>
                        </li>
                        @endif
                    <li>
                        <a class="page-scroll" href="logout">退出</a>
                    </li>
                    @else
                    <li>
                        <a class="page-scroll" href="welcome">登录</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="register">注册</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>定机神器，时时快人一步</h1>
                <hr>
                <p>开启移动的时代，时间不需要浪费</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">开启</a>
            </div>
        </div>
    </header>
    
    <section class="no-padding" id="about">
        <div class="container-fluid">
            <div class="row no-gutter">
                @foreach($data as $v)
                @if($v['status'] == 1)
                <div class="col-lg-4 col-sm-6">
                    <a href="select?id={{ $v['id'] }}" class="portfolio-box">
                        <img src="{{ $v['log'] }}" class="img-responsive" alt="{{ $v['iname'] }}">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    {{ $v['iname'] }}
                                </div>
                                <div class="project-name">
                                    {{ $v['tel'] }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
        </div>
    </section>

    <section id="services">
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>查看更多的网咖信息</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">进入</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">请留下足迹</h2>
                    <hr class="primary">
                    <p>如果您有宝贵的建议，请通过下面的联系方法联系我们</p>
                    <p>More Templates <a href="http://www.cssmoban.com/" target="_blank" title="定机神器">定机神器</a> - Collect from <a href="http://www.cssmoban.com/" title="定机神器" target="_blank">定机神器</a></p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
                
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>