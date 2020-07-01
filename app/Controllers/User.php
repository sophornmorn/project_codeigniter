<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
	public function register(){
        helper(['form']);
        $data = [];
        if($this->request->getMethod() =="post"){
            $rules = [
                'email' =>'required|valid_email',
                'password'=>'required',
                'address'=>'required'
			];
			//insert into database
            $athu = new UserModel();
            $newData = [
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'address' => $this->request->getVar('address'),
                'role' => $this->request->getVar('role'),
            ];

            $athu->insert($newData);
            return redirect()->to('/');
        }
        return view('auths/register');

	}
}
	

