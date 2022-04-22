<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class Role extends Model
{
    use HasFactory;
    public function isAdmin()
    {
        // $admin=hasRole(2);
        // $user=hasRole(1);
    }
}
