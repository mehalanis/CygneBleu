<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pays;
use App\Models\photos;

class ville extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom',"pays_id"];
    public function pays(){
        return $this->belongsTo(pays::class);
    }
    public function getAllphotos(){
        return photos::where([['type',3],['type_id',$this->id]])->get();
    }
}
