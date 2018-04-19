<?php
/**
 * Created by PhpStorm.
 * User: peterpan
 * Date: 2018/4/19
 * Time: 下午3:33
 */

namespace App\Http\Controllers;

//use App\Http\Controllers\View;
use Illuminate\Http\Request;


class DashController extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function dash()
    {
        return view('admin.dash');
    }
}
