<?php
/**
 * Created by PhpStorm.
 * User: peterpan
 * Date: 2018/4/19
 * Time: 下午3:49
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SetterController extends Controller
{
    private $request;
    private function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function hello(){

    }
}