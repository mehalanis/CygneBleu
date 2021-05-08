<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pays;

class ville extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom',"pays_id"];
    public function pays(){
        return $this->belongsTo(pays::class);
    }
}
