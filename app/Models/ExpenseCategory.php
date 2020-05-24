<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $table = 'expense_categories';

    protected $fillable = [
        "uuid",
        "name",
        "description",
        "created_at"
    ];

    protected $hidden = [
        'id',
        'updated_at'
    ];
}
