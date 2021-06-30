<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
	public $user;
	public $session;
	public $email;
	public function __construct(){
		$this->user = new User();
		$this->session = session();
		$this->email = \Config\Services::email();
	}
	public function index()
	{
		return view('auth/login');
	}
	public function register()
	{
		return view('auth/register');
	}
	public function store()
	{
		helper(['form','url']);
        $check = $this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
			'phone' => 'required|numeric',
			'age' => 'required|numeric',
			'gender' => 'required',
			'address' => 'required',
			'designation' => 'required',
			'password' => 'required|min_length[5]|max_length[10]',
        ]);
        $user = new User();
        if(!$check){
            return view('auth/register', ['validation' => $this->validator]);
        }else{
		$uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'. time()));
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
			'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'phone' => $this->request->getPost('phone'),
			'age' => $this->request->getPost('age'),
			'gender' => $this->request->getPost('gender'),
			'address' => $this->request->getPost('address'),
			'designation' => $this->request->getPost('designation'),
			'role_id' => 2,
			'uniid' => $uniid,
			'activation_date' => date('Y-m-d h:i:s'),
        ];
		if($user->save($data)){
			$to = $this->request->getPost('email');
			$subject = 'Account activation link';
			$message = 'Hi '.$this->request->getPost('name').",<br/><br/>Thanks Your account created"
			. "successfully. Please click the below link to activate your account<br><br>"
			. "<a href='". base_url()."/auth/activate/".$uniid."' target='_blank'>Activate Now</a><br><br>Thanks<br>GoPHP";

			$this->email->setTo($to);
			$this->email->setFrom('info@php.in', 'Info');
			$this->email->setSubject($subject);
			$this->email->setMessage($message);
			if($this->email->send()){
				return redirect()->to(base_url('/'))->with('status', 'Account created successfully. Please activate your account.');
			}else{
				return redirect()->to(current_url())->with('fail', 'Account created successfully. Sorry unable to send activation link. Contact admin.');
			}
		}else{
			return redirect()->to(current_url())->with('fail', 'Sorry unable to create an account. Try again.');
		}
        }
	}
	public function activate($uniid=null)
	{
		
	}
	public function check()
	{
		$session = session();
		$user = new User();
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$data = $user->where('email', $email)->first();	
		if($data){
			$pass = $data['password'];
			$verify_pass = password_verify($password, $pass);
			if($verify_pass){
				$ses_data = [
					'id'       => $data['id'],
					'name'     => $data['name'],
					'email'    => $data['email'],
					'role_id'  => $data['role_id'],
					'password' => $data['password'],
					'logged_in'     => TRUE
				];
				$session->set($ses_data);
				return redirect()->to('/users/index');
			}else{
				return redirect()->to(base_url('/'))->with('fail', 'Password is not correct');
			}
		}else{
			return redirect()->to(base_url('/'))->with('fail', 'Email not found');
		}
	}
	public function logout()
	{
		$session = session();
		$array_items = ['id', 'name', 'email', 'password', 'role_id', 'logged_in'];
		$session->remove($array_items);
		return redirect()->to(base_url('/'));
	}
	public function changePassword()
	{
		if(session()->get('role_id')==2){
			return view('auth/changepassword');
		}else{
			return view('auth/error');
		}
	}
	public function update()
	{
		if(session()->get('role_id')==2){
			helper(['form','url']);
			$check = $this->validate([
				'old_password' => 'required|min_length[5]|max_length[10]',
				'new_password' => 'required|min_length[5]|max_length[10]',
			]);
			$user = new User();
			if(!$check){
				return view('auth/changepassword', ['validation' => $this->validator]);
			}else{
			$id = session()->get('id');
			$old_password =  $this->request->getPost('old_password');
			$password = session()->get('password');
			$verify_pass = password_verify($old_password, $password);
				if($verify_pass){
					$data = [
						'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT),
					];
					$user->update($id, $data);  
					$session = session();
					$array_items = ['id', 'name', 'email', 'password', 'role_id', 'logged_in'];
					$session->remove($array_items);
					return redirect()->to(base_url('/'))->with('status', 'Password changed successfully, Login to continue.');
				}else{
					return redirect()->to(base_url('/auth/changepassword'))->with('fail', 'Password is not correct');
				}
			}
		}else{
			return view('auth/error');
		}
	}
}
