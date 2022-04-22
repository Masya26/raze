<?php

namespace App\Models;

use Database\Seeders\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

    'title',
    'name',
    'cat_id',
    'user_id',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function new_post(){

    }
    protected $dates = ['deleted_at'];
    
}
