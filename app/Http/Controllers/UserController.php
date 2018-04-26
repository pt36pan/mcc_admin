<?php
/**
 * Created by PhpStorm.
 * User: peterpan
 * Date: 2018/4/25
 * Time: 下午3:07
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Tools\StringConstants;
use App\Http\Controllers\Tools\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function doLogin()
    {
        $data = Input::get('data');
//        dd($data);
        return Utils::jsonResponse($data, StringConstants::Code_Succeed, '登陆成功');

    }
}