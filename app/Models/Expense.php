<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $fillable = [
        "uuid",
        "user_uuid",
        "category_uuid",
        "amount",
        "entry_date"
    ];

    protected $hidden = [
        'id',
        'updated_at'
    ];

    public function getEntryDateAttribute($value){
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Expense category relationship
     *
     */
    public function category()
    {
        return $this->hasOne(ExpenseCategory::class, 'uuid', 'category_uuid');
    }
}
