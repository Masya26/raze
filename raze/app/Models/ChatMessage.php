<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'reciver_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

}
