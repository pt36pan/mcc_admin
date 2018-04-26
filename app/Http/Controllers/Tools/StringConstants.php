<?php
/**
 * Created by PhpStorm.
 * User: zooter
 * Date: 16/3/25
 * Time: 下午5:05
 */

namespace App\Http\Controllers\Tools;

class StringConstants {

    // 错误码
    const Code_Succeed = 0;
    const Code_Failed = 1;
    const Code_Not_Login = 2; // 未登录用户不能调用
    const Code_Not_Logout = 3; // 已登录用户不能调用
    const Code_Db_Error = 4; // 数据库错误
    const Code_Server_Error = 5; // 服务器错误
    const Code_Db_Not_Find = 6; // 数据库未找到
    const Code_Resource_Not_Find = 7; // 找不到资源

    // 支付状态
    const PayStateDefault = 0;      // 未支付
    const PayStateSucceed = 1;      // 支付成功
    const PayStateFailed = 2;       // 支付失败
}