<?php

namespace Webkul\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Admin\Contracts\createUser as createUserContract;

class createUser extends Model implements createUserContract
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

}