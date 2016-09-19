<?php
/**
 * Created by PhpStorm.
 * User: tonyzhang
 * Date: 2016/3/5
 * Time: 0:06
 */

namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller{

    public function __construct()
    {
        $username = session('username');
        if (!$username) {
            $url = U('Admin/login/login');
            $this->jump($url);
        }

    }

    private function jump($url)
    {
        header("Location:http://localhost".$url);
    }

    public function test()
    {
        echo '中秋'；
    }
}