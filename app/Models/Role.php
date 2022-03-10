<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;

class Role extends Model
{
    use HasFactory;
    

    public function user()
    {
        return $this->hasOne(User::class, 'role_id', 'id');
    }

        public function users()
    {
        return $this->hasOne(User::class, 'role_users');
    }

}
