{{--* Created by PhpStorm.--}}
{{--* User: peterpan--}}
{{--* Date: 2018/4/19--}}
{{--* Time: 上午9:43--}}
<!DOCTYPE html>
<html>
<head>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>山顶部落科技管理后台</title>
    {{--<link rel='icon' href='logo-64.ico' type=‘image/x-ico’ />--}}

    {{--字体图标库--}}
    <link rel="stylesheet" type="text/css" href="{{asset('http://at.alicdn.com/t/font_640239_776xcnt52i96bt9.css')}}">
    {{--字体图标库--}}

    <link rel="stylesheet" type="text/css" href="{{asset('css/external/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/baseLayout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/external/navSide/nav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/external/navSide/iconfont.css')}}">

    {{--各页面自己的 css --}}
    @yield('resource')
</head>

<body>
<div class="base_content">
    <div class="base_content_left">
        <div class="nav">
            <div class="nav-top">
                <div id="mini">
                    <img class="mini-logo-long" src="assets/admin/logo-long-white.png">
                    <img class="mini-logo hidden" src="assets/admin/logo_white.png">
                </div>
                <div class="nav-top-info">
                    <img src="assets/admin/wechatImg.png">
                    <span>管理员</span>
                </div>

            </div>
            <ul>
                <li class="nav-item" id="dash">
                    <a href="javascript:;"><i class="iconfont icon-zhiliangfenxi"></i><span>仪表盘</span><i class="my-icon nav-more"></i></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;"><i class="iconfont icon-product"></i><span>产品中心</span><i class="my-icon nav-more"></i></a>
                    <ul>
                        <li class="product" data-type="0"><a href="javascript:;"><span>海外营地</span><i class="my-icon nav-more-static"></i></a></li>
                        <li class="product" data-type="1"><a href="javascript:;"><span>国内营地</span><i class="my-icon nav-more-static"></i></a></li>
                        <li id="addProduct"><a href="javascript:;"><span>新增产品</span><i class="my-icon nav-more-add"></i></a></li>
                    </ul>
                </li>
                <li class="nav-item" id="purchase">
                    <a href="javascript:;"><i class="iconfont icon-bianmaguize"></i><span>订单管理</span><i class="my-icon nav-more"></i></a>
                </li>
                <li class="nav-item" id="banner">
                    <a href="javascript:;"><i class="iconfont icon-fanwei"></i><span>轮播图</span><i class="my-icon nav-more"></i></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;"><i class="iconfont icon-guanyu"></i><span>关于我们</span><i class="my-icon nav-more"></i></a>
                    <ul>
                        <li class="aboutUs" data-type="0"><a href="javascript:;"><span>公司信息</span><i class="my-icon nav-more-static"></i></a></li>
                        <li class="aboutUs" data-type="1"><a href="javascript:;"><span>发展历程</span><i class="my-icon nav-more-static"></i></a></li>
                        <li class="aboutUs" data-type="2"><a href="javascript:;"><span>品牌咨询</span><i class="my-icon nav-more-static"></i></a></li>
                        <li class="aboutUs" data-type="3"><a href="javascript:;"><span>宣传视频</span><i class="my-icon nav-more-static"></i></a></li>
                        <li class="aboutUs" data-type="4"><a href="javascript:;"><span>加入我们</span><i class="my-icon nav-more-static"></i></a></li>
                    </ul>
                </li>
                <li class="nav-item" id="customerService">
                    <a href="javascript:;"><i class="iconfont icon-bangzhuzixun"></i><span>客服系统</span><i class="my-icon nav-more"></i></a>
                </li>
                <li class="nav-item" id="systemSetting">
                    <a href="javascript:;"><i class="iconfont icon-shezhi"></i><span>系统设置Dev</span><i class="my-icon nav-more"></i></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="base_content_right">
        <div class="base_content_head">
            <div class="base_content_head_item">
                这里可以做面包屑导航
            </div>
            <div class="base_content_head_item">
                <div id="btn_exitLogin">
                    <i class="iconfont icon-zhuxiaoxitong"></i>
                    <span>退出</span>
                </div>
            </div>
        </div>
        <div class="base_content_body">
            {{--各页面的 blade view --}}
            @yield('content')
        </div>
    </div>
</div>

    <script type="text/javascript" src="{{URL::to('js/external/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/external/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/external/navSide/nav.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/admin/base.js')}}"></script>

</body>

</html>
