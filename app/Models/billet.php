<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ville;
use App\Models\photos;
use App\Models\BilletDate;

class billet extends Model
{
    use HasFactory;
    protected $fillable = ['id',"ville_depart_id","ville_arrivee_id","photo","type","prix","state"];
    public function villeDepartId(){
        return $this->belongsTo(ville::class,"ville_depart_id");
    }
    public function villeArriveeId(){
        return $this->belongsTo(ville::class,"ville_arrivee_id");
    }
    public function BilletDate(){
        return $this->hasMany(BilletDate::class);
    }
    public function getAllphotos(){
        return photos::where([['type',3],['type_id',$this->id]])->get();
    }
}
