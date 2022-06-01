<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashIn extends Model
{
    use HasFactory;

    protected $table = 'cash_ins';

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['user'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
