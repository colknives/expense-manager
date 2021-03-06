<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        "uuid",
        "name",
        "description",
        "admin",
        "created_at"
    ];

    protected $hidden = [
        'id',
        'updated_at'
    ];
}
