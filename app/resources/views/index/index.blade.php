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
                <a class="navbar-brand page-scroll" href="djsq.qlh6.com">定机神器</a>
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
                        <img src="{{ $v['log'] }}" class="img-responsive" alt="{{ $v['iname'] }}" style="width:500px;height:400px;">
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

            
    <section class="no-padding" id="about">
        <div class="container-fluid">
            <div class="row no-gutter">
               
                <div class="col-lg-4 col-sm-6">
                    <body>

                        <style type="text/css">
                        *{margin:0;padding:0;list-style-type:none;}
                        a,img{border:0;}
                        body{min-width:1007px;font:12px/1.5 tahoma,sans-serif;}
                        .advbox{position:relative;margin:0px auto;width:980px;background:#e8e8e8}
                        .advbox .advbtn{position:absolute;width:19px;display:none;height:55px;top:10px;right:-23px}
                        .advbox .advbtn a{display:block;background:url(images/gg_btn.png) no-repeat 0px 0px;height:55px;overflow:hidden}
                        .advbox .advbtn .advclose{background:url(images/gg_btn.png) no-repeat -19px 0px;}
                        .advbox .advcon{display:none;height:200px;}
                        </style>

                        <div class="advbox">

                            <div class="advbtn">
                                <a style="display:none" class="advreplay" title="重播" href="javascript:void(0);"></a>

                                <a class="advclose" title="关闭" href="javascript:void(0);"></a>
                            </div>
                            <div class="advcon"></div>
                        </div><!--advbox end-->
                        </body>
                </div>
        </div>
        <!-- 广告展示 -->
             


<body>
<p style="color:black">商家广告展示：</p>
<div id="scrollDiv">
  <ul>
    <li>这是公告标题的第一行</li>
    <li>这是公告标题的第二行</li>
    <li>这是公告标题的第三行</li>
    <li>这是公告标题的第四行</li>
    <li>这是公告标题的第五行</li>
    <li>这是公告标题的第六行</li>
    <li>这是公告标题的第七行</li>
    <li>这是公告标题的第八行</li>
  </ul>
</div>
</body>
    </section>



    <section id="services">
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">

                <h2>查看更多的网咖信息</h2>
               <input type="text" width="100" id="wang" style="color:red">
                <button class="btn btn-default btn-xl wow tada" id="butt" value="进入">进入</button> 
                <div>
                <html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
        #allmap{width:100%;height:500px;}
        p{margin-left:5px; font-size:14px;}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=gkAcbCewFPWLQawcuUsEMHFRBqDETZaS"></script>
</head>
<body>
    <div id="allmap"></div>
    <p>地图上圆形覆盖范围内检索结果，并展示在地图上【百度地图】</p>
</body>
</html>
                </div>
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>多行滚动jQuery循环新闻列表代码</title>
<style type="text/css">
ul,li{margin:0;padding:0}
#scrollDiv{width:900px;height:100px;min-height:25px;line-height:25px;border:#ccc 1px solid;overflow:hidden}
#scrollDiv li{height:25px;padding-left:10px;}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
//滚动插件
(function($){
$.fn.extend({
        Scroll:function(opt,callback){
                //参数初始化
                if(!opt) var opt={};
                var _this=this.eq(0).find("ul:first");
                var        lineH=_this.find("li:first").height(), //获取行高
                        line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10), //每次滚动的行数，默认为一屏，即父容器高度
                        speed=opt.speed?parseInt(opt.speed,10):800, //卷动速度，数值越大，速度越慢（毫秒）
                        timer=opt.timer?parseInt(opt.timer,10):8000; //滚动的时间间隔（毫秒）
                if(line==0) line=1;
                var upHeight=0-line*lineH;
                //滚动函数
                scrollUp=function(){
                        _this.animate({
                                marginTop:upHeight
                        },speed,function(){
                                for(i=1;i<=line;i++){
                                        _this.find("li:first").appendTo(_this);
                                }
                                _this.css({marginTop:0});
                        });
                }
                //鼠标事件绑定
                _this.hover(function(){
                        clearInterval(timerID);
                },function(){
                        timerID=setInterval("scrollUp()",timer);
                }).mouseout();
        }        
})
})(jQuery);

$(document).ready(function(){
        $("#scrollDiv").Scroll({line:4,speed:800,timer:2000});
});
</script>
</head>
<script type="text/javascript">
//首页大广告
var gg960ShowTime = 10000; //播放时间
var gg960Time = null;

function open_gg960(showBtn){
    $('.advbox .advcon').html(gg960Con).slideDown(300,function(){
        if(showBtn !== false){
            $('.advbox .advbtn').fadeIn();
        }
        if(gg960Time){clearTimeout(gg960Time);}
        gg960Time = setTimeout(close_gg960,gg960ShowTime);
    });
}
function close_gg960(){
    $('.advbox .advcon').slideUp(500,function(){
        $(this).html('');
        $('.advclose').hide();
        $('.advreplay').show();
    });
}
$('.advclose').click(function(){
    if(gg960Time){clearTimeout(gg960Time);}
    close_gg960();
    return false;
});
$('.advreplay').click(function(){
    if(gg960Time){clearTimeout(gg960Time);}
    open_gg960(false);
    $('.advreplay').hide();
    $('.advclose').show();
    return false;
});

var gg960Con;
var fullAdType = 'swf';
var fullAdUrl = 'http://djsq.qlh6.com/'
var fullAdName = 'images/qpad.swf';;
if(fullAdName){
    if(fullAdType == 'swf'){
        gg960Con = '<embed wmode="transparent" height="400" width="980" flashvars="alink1='+fullAdUrl+'" allowscriptaccess="always" quality="high" name="Advertisement" id="Advertisement" style="" src="images/qpad.swf" type="application/x-shockwave-flash"></embed>';
        
    }else{
        gg960Con = '<a href="'+fullAdUrl+'" target="_blank"><img width="980" height="600" src="images/qpad.jpg"/></a>';//flash无法显示时，显示JPG广告
    }
    
    setTimeout(open_gg960,1500);//延迟显示
}
</script>

<script type="text/javascript">
    $(function(){
        // 百度地图API功能
            var map = new BMap.Map("allmap");            // 创建Map实例
            var mPoint = new BMap.Point(116.306406,40.049256);  
            map.enableScrollWheelZoom();
            map.centerAndZoom(mPoint,12);

            var circle = new BMap.Circle(mPoint,1000,{fillColor:"blue", strokeWeight: 1 ,fillOpacity: 0.3, strokeOpacity: 0.3});
            map.addOverlay(circle);
            var local =  new BMap.LocalSearch(map, {renderOptions: {map: map, autoViewport: false}});  
            local.searchNearby('网吧',mPoint,1000);
        $('#butt').click(function(){
            // 百度地图API功能
            var map = new BMap.Map("allmap");            // 创建Map实例
            var mPoint = new BMap.Point(116.306406,40.049256);  
            map.enableScrollWheelZoom();
            map.centerAndZoom(mPoint,12);

            var circle = new BMap.Circle(mPoint,1000,{fillColor:"blue", strokeWeight: 1 ,fillOpacity: 0.3, strokeOpacity: 0.3});
            map.addOverlay(circle);
            var local =  new BMap.LocalSearch(map, {renderOptions: {map: map, autoViewport: false}});  
            var wang = $('#wang').val();
            local.searchNearby(wang,mPoint,1000);
        });
    });
    

    
</script>
