<?php
/**
 * Created by PhpStorm.
 * User: tonyzhang
 * Date: 2016/9/4
 * Time: 0:00
 */

namespace Admin\Controller;;

use Think\Controller;

class LoginController extends Controller {

    public function login()
    {
        $this->display();
    }

    public function loginCheck()
    {
        $request = array('accessGranted' => false, 'error' => '');
        $userObj = M('user');
        $user = $userObj->where(array('username'=> $_REQUEST['username']))->find();
        $passwd = md5($_REQUEST['passwd']);
        if ($user['password'] == $passwd) {
            $request['accessGranted'] = true;
            session('username',$_REQUEST['username']);
            $user_info = [
                'uid' => $user['uid'],
                'logintime' => time(),
                'lastip'  => $_SERVER['REMOTE_ADDR']
            ];
            $userObj->save($user_info);
        }else{
            $request['error'] = '密码错误';
        }

        echo json_encode($request);
    }
}