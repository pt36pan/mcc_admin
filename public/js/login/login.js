/**
 * Created by peterpan on 2018/4/18.
 */
let errorMsg = '';
let name = '';
let password = '';
$(document).ready(function () {

    //检查表单
    function checkForm() {
        name = $('#input_name').val().trim();
        password = $('#input_password').val().trim();

        //汉字校验
        let patten_cn = /^[\u4e00-\u9fa5]{0,}$/;
        //密码校验
        let patten_psw = /^[a-zA-Z]\w{5,17}$/;

        if(name === ''){
            errorMsg = '用户名不能为空';
            $('.has-feedback').eq(0).addClass('has-error')
            $('.glyphicon').eq(0).addClass('glyphicon-remove');
            return false
        }else{
            if(patten_cn.test(name)){
                //包含汉字
                errorMsg = '用户名不包含汉字，请检查';
                $('.has-feedback').eq(0).addClass('has-error')
                $('.glyphicon').eq(0).addClass('glyphicon-remove');
                return false
            }else{
                $('.has-feedback').eq(0).removeClass('has-error')
                $('.glyphicon').eq(0).removeClass('glyphicon-remove');
            }
        }

        if(password === ''){
            errorMsg = '密码不能为空';
            $('.has-feedback').eq(1).addClass('has-error')
            $('.glyphicon').eq(1).addClass('glyphicon-remove');
            return false
        }else{
            $('.has-feedback').eq(1).removeClass('has-error');
            $('.glyphicon').eq(1).removeClass('glyphicon-remove');
        }

        return true
    }
    //登录操作
    function doLogin() {
        //表单检查通过
        if(checkForm()){
            //发起登录请求
            // console.log('验证成功');
            let params = {
                u_name: name,
                u_psw: password
            };

            $.post('/doLogin',{data:params},function (data) {
                console.log(data);
                if(data.code === 0){
                    //登陆成功
                    window.location = '/dashboard'
                }else if(data.code === 1){
                    //登陆失败
                    console.log(data.msg)
                }else{

                }
            });
        }else{
            console.log(errorMsg);
        }
    }

    $('#btn_login').on('click',function () {
        doLogin();
    })
});