<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
    // Login form
    public function loginForm(){

        helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){

            // set rule on field login form
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|validateUser[email,password]'
            ];
            //this message appea when email not much with data in database
			$error = [
				'password' => [
					'validateUser' => 'password not match!!!'
				]
            ];
            
            $email = $this->request->getVar('email');
			if(!$this->validate($rules,$error)){
				$data['message'] = $this->validator;
			}else{
				$model = new UserModel();
				$user = $model->where('email',$email)->first();
				$this->setUserSession($user);
				return redirect()->to('/pizza');
			}
		}
        return view('auths/login',$data);
    }

    public function setUserSession($user){
		$data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'password' => $user['password'],
			'address' => $user['address'],
			'role' => $user['role'],
		];
		session()->set($data);
		return true;
	}
    


// Register Form

    public function register(){
        helper(['form']);
        $data = [];
        if($this->request->getMethod() =="post"){
            $rules = [
                'email' =>'required|valid_email',
                'password'=>'required',
                'address'=>'required'
            ];
            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                //insert into database
            $athu = new UserModel();
            $newData = [
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'address' => $this->request->getVar('address'),
                'role' => $this->request->getVar('role'),
            ];
            $athu->save($newData);
            $session = session();
            $session->setFlashdata('success','successful Register');
            return redirect()->to('/');
            }
		
        }
        return view('auths/register',$data);
    }

}
	