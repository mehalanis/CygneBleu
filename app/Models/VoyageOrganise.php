<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\photos;
use App\Models\ville;
use App\Models\VoyageOrganiseDate;

class VoyageOrganise extends Model
{
    use HasFactory;
    protected $fillable = ['id',"nom", 'Nb_jour',"description","photo","prixAdulte","prixAdolescente","prixEnfant","ville_id"];
    public function getAllphotos(){
        return photos::where([['type',1],['type_id',$this->id]])->get();
    }
    public function ville(){
        return $this->belongsTo(ville::class);
    }
    public function VoyageOrganiseDate(){
        return $this->hasMany(VoyageOrganiseDate::class);
    }
}
