<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanerInformation extends Model
{
    use HasFactory;

    protected $table = 'loaner_information';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
