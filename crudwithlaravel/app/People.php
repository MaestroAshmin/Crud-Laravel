<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'Id';
    protected $fillable = ([
        'name' => 'name',
        'address' => 'address',
        'email' => 'email',
        'image' => 'image',
        'file' => 'file',
    ]);
}
