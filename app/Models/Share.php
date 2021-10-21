<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    public function user()
    {
        //link to its parent's primary key
        return $this->belongsTo(User::class, 'foreign_key');
    }
}
