<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ville;
use App\Models\photos;
class billet extends Model
{
    use HasFactory;
    protected $fillable = ['id',"ville_id","photo","type","prix","state"];
    public function ville(){
        return $this->belongsTo(ville::class);
    }
    public function getAllphotos(){
        return photos::where([['type',3],['type_id',$this->id]])->get();
    }
}
