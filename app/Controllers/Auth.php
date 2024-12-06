<?php

namespace App\Controllers;
use Codeigniter\HTTP\MessageInterface;

class Auth extends BaseController
{
    public function index()
    {
        $user = new \App\Models\User_Model();
        if($user->countAllResults()==0){
            $user->insert(['username'=>'admin', 'password'=>password_hash('123', PASSWORD_DEFAULT)]);
        }
        return view('login');
    }
    function login()
    {
        $user = new \App\Models\User_Model();
        $param =  $this->request->getPost();
        $item = $user->where('username', $param['username'])->first();
        if(password_verify($param['password'],$item['password'])) {
            session()->set(['nama'=>'Estevina', 'akses'=>'Admin', 'isLogin'=> true]);
            return redirect()->to(base_url('layout'));
        }else{
            echo "<script>alert('password salah')</script>";
        }
    }
    function logout(){
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}
?>