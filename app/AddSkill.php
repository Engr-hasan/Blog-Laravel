<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddSkill extends Model
{
    protected $table = 'add_skills';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'ref_id',
        'skill_name',
        'skill_status',
        'skill_duration',
        'good_skill',
        'bad_skill',
        'skill_attach',
        'created_at',
        'updated_at'
    ];
}
