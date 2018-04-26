 {{--* Created by PhpStorm.--}}
 {{--* User: peterpan--}}
 {{--* Date: 2018/4/18--}}
 {{--* Time: 下午1:57--}}
<!DOCTYPE html>
<html>
    <head>
        <title>山顶部落教育科技有限公司</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{asset('css/external/bootstrap.min.css')}}">
        {{--字体图标--}}
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/glyphicon.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('css/base/base.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/login/login.css')}}">

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="content_item logo">
                    <img src="../assets/img/login/logo_white.png">
                </div>
                <div class="content_item login">
                    <div class="login_content">
                        <div style="text-align: center;color:#4876FF">山顶部落教育科技<br>
                            <span style="color: darkgray">admin</span>
                        </div>

                            <div class="has-feedback">
                                <input class="form-control bottom_border" placeholder="your name" id="input_name">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                            </div>
                            <div class="has-feedback">
                                <input class="form-control bottom_border" type="password" placeholder="your password" id="input_password">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <button class="btn btn-default" id="btn_login">login</button>

                        <span id="btn_forgot_password">Forgot password?</span>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{URL::to('js/external/jquery-3.3.1.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('js/external/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('js/login/login.js')}}"></script>
    </body>
</html>
