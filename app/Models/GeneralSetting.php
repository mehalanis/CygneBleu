<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Telephone_1', 'Telephone_2', 'Fix', 'Email','Adresse',"facebook","instagram","twitter","youtube"];

}
