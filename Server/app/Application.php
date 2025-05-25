<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'fullName', 'email', 'phone', 'position', 'resume', 'message',
    ];
}
