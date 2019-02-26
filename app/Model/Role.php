<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table    = 'user_role'; 

    protected $fillable = [
        'role_name', 'status', 'created_at', 'updated_at', 'is_delete',
    ];
}