/**
 * Created by peterpan on 2018/4/19.
 */
/* currentMenu:当前点击的菜单位置，用于页面初始化
    0 仪表盘 1 产品中心 2 订单管理 3 轮播图管理 4 关于我们 5 客服系统 6 系统设置
*/
let currentMenu = 0;

$(document).ready(function () {
    //初始化导航
    initMenuEvent();

    //初始化头部 面包屑、退出按钮
    initHeadEvent();

});

//初始化左侧导航 点击事件
function initMenuEvent() {
    //仪表盘初始化
    addClickEvent($('#dash'),function () {
        $('.nav-item').children('ul').slideUp(300);
        window.location = '/dash'
    });

    //产品中心 初始化
    $.each($('.product'),function () {
        addClickEvent($(this),function () {
            alert('product'+$(this).attr('data-type'))
        })
    });
    addClickEvent($('#addProduct'),function () {
        alert('add product')
    });

    //订单管理 初始化
    addClickEvent($('#purchase'),function () {
        $('.nav-item').children('ul').slideUp(300);
        alert('purchase');
    });

    //轮播图 初始化
    addClickEvent($('#banner'),function () {
        $('.nav-item').children('ul').slideUp(300);
        alert('banner');
    });

    //关于我们 初始化
    $.each($('.aboutUs'),function () {
        addClickEvent($(this),function () {
            alert('aboutUs'+$(this).attr('data-type'))
        })
    });

    //客服系统 初始化
    addClickEvent($('#customerService'),function () {
        $('.nav-item').children('ul').slideUp(300);
        alert('customerService');
    });

    //系统设置 初始化
    addClickEvent($('#systemSetting'),function () {
        $('.nav-item').children('ul').slideUp(300);
        alert('systemSetting');
    })
}

//初始化头部事件
function initHeadEvent() {
    //退出按钮 点击事件
    addClickEvent($('#btn_exitLogin'), function () {
        exitAdmin();
    });
    //<退出管理台> 操作
    function exitAdmin() {
        alert('exit');
    }

    //面包屑初始化
    // TODO CODE
}

//添加元素时间 侦听
function addClickEvent(el , fn) {
    el.on('click',fn)
}
