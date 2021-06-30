<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','email', 'phone', 'age', 'gender', 'address', 'designation', 'password', 'role_id', 'uniid', 'activation_date'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $date = ['deleted_at'];
}
