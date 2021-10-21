<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    protected $fillable = ['image', 'title', 'description', 'user_id'];

    public function user()
    {
        //link to its parent's primary key
        return $this->belongsTo(User::class);
    }
}
