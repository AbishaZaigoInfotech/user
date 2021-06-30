<?php

namespace App\Controllers;
use App\Models\User;

class Users extends BaseController
{
	public function index()
	{ 
		$data['logged_user'] = session()->get('role_id');
		$users = new User();
		if($this->request->getGet('search')){
			$search = $this->request->getGet('search');
			$users->like('name', $search); 
		}
		if($this->request->getGet('designation')){
			$designation = $this->request->getGet('designation');
			$users->where('designation', $designation);
		}
		$data['users'] = $users->findAll();
		return view('users/index', $data);
	}
    public function create()
	{
		if(session()->get('role_id')==1){
			return view('users/create');
		}else{
			return view('auth/error');
		}
	}
	public function store()
	{
		if(session()->get('role_id')==1){
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
				return view('users/create', ['validation' => $this->validator]);
			}else{
			$data = [
				'name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'phone' => $this->request->getPost('phone'),
				'age' => $this->request->getPost('age'),
				'gender' => $this->request->getPost('gender'),
				'address' => $this->request->getPost('address'),
				'designation' => $this->request->getPost('designation'),
				'role_id' => 2,
			];
			$user->save($data);
			return redirect()->to(base_url('/users/index'))->with('status', 'User created successfully.');
			}
		}else{
			return view('auth/error');
		}
	}
	public function edit($id)
	{
		if(session()->get('role_id')==1){
		$user = new User();
        $data['user'] = $user->find($id);
		return view('users/edit', $data);
		}else{
			return view('auth/error');
		}
	}
	public function update($id)
	{
		if(session()->get('role_id')==1){
			$user = new User();
			helper(['form','url']);
			$check = $this->validate([
				'name' => 'required|min_length[3]',
				'email' => 'required|valid_email',
				'phone' => 'required|numeric',
				'age' => 'required|numeric',
				'gender' => 'required',
				'address' => 'required',
				'designation' => 'required',
			]);
			if(!$check){
				return view('users/edit', ['validation' => $this->validator]);
			}else{
				$data = [
					'name' => $this->request->getVar('name'),
					'email' => $this->request->getVar('email'),
					'phone' => $this->request->getPost('phone'),
					'age' => $this->request->getPost('age'),
					'gender' => $this->request->getPost('gender'),
					'address' => $this->request->getPost('address'),
					'designation' => $this->request->getPost('designation'),
				];  
				$user->update($id, $data);     
				return redirect()->to(base_url('users/index'))->with('status', 'User updated successfully');
			}
		}else{
		return view('auth/error');
		}
	}
	public function destroy($id)
	{
		if(session()->get('role_id')==1){
			$user = new User();
			$user->delete($id); 
			return redirect()->to(base_url('users/index'))->with('status', 'User deleted successfully');
		}else{
			return view('auth/error');
		}
    }
	public function show()
	{
		if(session()->get('role_id')==1){
			$user = new User();
        	$data['user'] = $user->find(1);
			return view('users/show', $data);
		}else{
			return view('auth/error');
		}
	}
}