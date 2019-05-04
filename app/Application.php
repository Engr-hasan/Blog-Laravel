<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name_of_skill',
        'created_at',
        'updated_at'
    ];
}
