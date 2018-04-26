<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 16/3/16
 * Time: 上午10:08
 */

namespace App\Http\Controllers\Tools;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class Utils
{

    public function __construct()
    {
    }

    // debug 日志
    static public function log($data)
    {

        $enableLog = env('Utils_log', false);

        if ($enableLog) {

            if (!is_string($data)) {
                $msg = var_export($data, true);
            } else {
                $msg = $data;
            }

            $timeStamp = time();
            $timeStr = date('y-m-d G:i:s', $timeStamp);
            error_log("[$timeStr] $msg\n", '3', '../storage/logs/debug.log');
        }
    }

    /**
     * 专用于正式环境debug 平时不要用
     * @param $data
     */
    static public function productionDebug($data)
    {
        if (!is_string($data)) {
            $msg = var_export($data, true);
        } else {
            $msg = $data;
        }

        $timeStamp = time();
        $timeStr = date('y-m-d G:i:s', $timeStamp);
        error_log("[$timeStr] $msg\n", '3', '../storage/logs/productionDebug.log');
    }

    /**
     * @return mixed|string
     * 获取UserId
     */
    static public function getUserId()
    {
        $userId = Input::get('user_id');
        if (Utils::isValidId($userId)) {
            return $userId;
        } else {
            return '';
        }
    }

    static public function getStringParam($key)
    {
        $value = Input::get($key);

        if (Utils::isValidId($value)) {
            return $value;
        } else {
            return '';
        }
    }

    static public function getNumberParam($key)
    {
        $value = Input::get($key);
        if (Utils::isValidNumber($value)) {
            return $value;
        } else {
            return 0;
        }
    }

    static public function getPageSize($pageSize = null, $key = 'page_size')
    {
        if ($pageSize == null) {
            $buzData = Utils::getBizData();
            if (property_exists($buzData, $key)) {
                $pageSize = $buzData->page_size;
                if (Utils::isValidNumber($pageSize) && $pageSize >= 0 && $pageSize <= 50) {
                    $pageSize = ceil((float)$pageSize);
                    return $pageSize;
                }
            }
        }
        return 20;
    }

    static public function getBizData()
    {
        return (object)Input::get('buz_data');
    }

    // 访问日志
    static public function logVisit($data)
    {

        if (!is_string($data)) {
            $msg = var_export($data, true);
        } else {
            $msg = $data;
        }

        $timeStamp = time();
        $timeStr = date('y-m-d G:i:s', $timeStamp);
        $date = substr($timeStr, 0, 8);
        error_log("[$timeStr] $msg\n", '3', "../storage/logs/visit/visit_$date.log");
    }

    static public function jsonResponse($data = null, $code = StringConstants::Code_Succeed, $msg = '')
    {
        $data = Utils::replaceAllNullToEmptyString($data);

        return response()->json(Utils::pack($data, $code, $msg));
    }

    static public function pack($data, $code = StringConstants::Code_Succeed, $msg = '')
    {
        $package = array('code' => $code, 'msg' => $msg, 'data' => $data);
        return $package;
    }

    static function replaceAllNullToEmptyString($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = Utils::replaceAllNullToEmptyString($value);
            }
        } else if (is_object($data)) {
            foreach ($data as $key => $value) {
                $data->$key = Utils::replaceAllNullToEmptyString($value);
            }
        } else if ($data === null) {
            $data = '';
        }
        return $data;
    }

    static public function isEmptyString($str)
    {
        if (!isset($str) || $str == '') {
            return true;
        } else {
            return false;
        }
    }

    static public function isValidId($id)
    {
        if (is_int($id) && $id >= 0) {
            return true;
        } else if (is_string($id) && strlen($id) > 0) {
            return true;
        } else {
            return false;
        }
    }

    static public function isValidNumber($number)
    {
        if (is_numeric($number)) {
            return true;
        } else {
            return false;
        }
    }

    static public function isValidPageNumber($pageNumber)
    {
        return (Utils::isValidNumber($pageNumber) && intval($pageNumber) > 0);
    }

    static public function isValidPhoneNumber($phone)
    {
        if (preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/', $phone)) {
            //验证通过
            return true;
        } else {
            //手机号码格式不对
            return false;
        }
    }

    static public function isValidEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    static public function isValidPassword($password)
    {
        if (strlen($password) < 6) {
            return false;
        } else {
            return true;
        }
    }

    static public function isValidIdCardNumber($idCardNumber)
    {
        if (preg_match('/^\d{17}(\d|X|x)$/', $idCardNumber)) {
            return true;
        } else {
            return false;
        }
    }

    static public function isValidTimeInDB($dbTime)
    {
        if ($dbTime == null || Utils::isEmptyString($dbTime)) {
            return false;
        }
        $timestamp = Utils::getTimestamp($dbTime);
        if ($timestamp == false || $timestamp == -1 || $timestamp == 0) {
            return false;
        }
        return true;
    }

    static public function getUniId($prefix = 'i_', $suffixLength = 8)
    {
        return uniqid($prefix, false) . '_' . Utils::generateRandomCode($suffixLength, 'ALL');
    }

    static public function getUniIdStartWithTimestamp($prefix = 'o_', $suffixLength = 8)
    {
        $currentTimestamp = time();
        $prefix = $prefix . $currentTimestamp . '_';
        return uniqid($prefix, false) . '_' . Utils::generateRandomCode($suffixLength);
    }

    static public function getOrderId($suffixLength = 8)
    {
        return date("YmdGi", time()) . Utils::generateRandomCode($suffixLength, 'ALL');
    }

    /**
     * @return string
     * 获取服务器的内网ip
     */
    static public function getServerInsideAddress() {
        $server = Request::instance()->server();
        if (key_exists('SERVER_ADDR', $server)) {
            return $server['SERVER_ADDR'];
        } else {
            return '';
        }
    }

    static public function generateRandomCode($len = 6, $format = 'NUMBER')
    {
        switch ($format) {
            case 'ALL':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                break;
            case 'CHAR':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                break;
            case 'NUMBER':
                $chars = '0123456789';
                break;
            default :
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                break;
        }
        mt_srand((double)microtime() * 1000000 * getmypid());
        $code = "";
        while (strlen($code) < $len)
            $code .= substr($chars, (mt_rand() % strlen($chars)), 1);
        return $code;
    }

    static public function getTime($addSeconds = 0)
    {
        $seconds = time() + $addSeconds;
        return date('Y-m-d H:i:s', $seconds);
    }

    static public function getTimeSecondToMinute($seconds)
    {
        return date('i:s', $seconds);
    }

    static public function getTimestamp($dbTime)
    {
        return strtotime($dbTime);
    }

    static public function getTimeFromNow($timeStamp)
    {
        $timeDiff = time() - $timeStamp;
        if ($timeDiff < 60) {
            return '刚刚';
        } else if ($timeDiff < 3600) {
            return floor($timeDiff / 60) . '分钟前';
        } else if ($timeDiff < 3600 * 24) {
            return floor($timeDiff / 3600) . '小时前';
        } else if ($timeDiff < 3600 * 24 * 30) {
            return floor($timeDiff / 3600 / 24) . '天前';
        } else {
            $date = date('Y-m-d', $timeStamp);
            return $date;
        }
    }

    static public function formatMoney($money, $decimals = 1)
    {
        if ($money < 100) {
            $temp = $money / 100;
            $result[0] = $temp;
            $result[1] = '元';
        } else if ($money < 10000 * 100) {
            $temp = $money / 100;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '元';
        } else if ($money < 10000 * 10000 * 100) {
            $temp = $money / 100 / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '万';
        } else if ($money < 10000 * 10000 * 10000 * 100) {
            $temp = $money / 100 / 10000 / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '亿';
        } else {
            $temp = $money / 100;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '元';
        }
        return $result;
    }

    static public function formatTaskCount($tasksCount, $decimals = 1)
    {
        if ($tasksCount < 10000) {
            $result[0] = $tasksCount;
            $result[1] = '个';
        } else if ($tasksCount < 10000 * 10000) {
            $temp = $tasksCount / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '万';
        } else if ($tasksCount < 10000 * 10000 * 10000) {
            $temp = $tasksCount / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '亿';
        } else {
            $result[0] = $tasksCount;
            $result[1] = '个';
        }
        return $result;
    }

    static public function formatBondCount($count, $decimals = 1)
    {
        if ($count < 10000) {
            $result[0] = $count;
            $result[1] = '位';
        } else if ($count < 10000 * 10000) {
            $temp = $count / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '万';
        } else if ($count < 10000 * 10000 * 10000) {
            $temp = $count / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '亿';
        } else {
            $result[0] = $count;
            $result[1] = '位';
        }
        return $result;
    }

    static public function formatUserCount($count, $decimals = 1)
    {
        if ($count < 10000) {
            $result[0] = $count;
            $result[1] = '个';
        } else if ($count < 10000 * 10000) {
            $temp = $count / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '万';
        } else if ($count < 10000 * 10000 * 10000) {
            $temp = $count / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '亿';
        } else {
            $result[0] = $count;
            $result[1] = '位';
        }
        return $result;
    }

    static public function formatViewCount($count, $decimals = 1)
    {
        if ($count < 10000) {
            $result[0] = $count;
            $result[1] = '';
        } else if ($count < 10000 * 10000) {
            $temp = $count / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '万';
        } else if ($count < 10000 * 10000 * 10000) {
            $temp = $count / 10000;
            $result[0] = number_format($temp, $decimals);
            $result[1] = '亿';
        } else {
            $result[0] = $count;
            $result[1] = '';
        }
        return $result;
    }

}