<?php
/**
 * Created by PhpStorm.
 * User: peterpan
 * Date: 2018/4/27
 * Time: 下午2:03
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getPurchase()
    {
        //dash
        return view('admin/purchase');
    }
}