<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\photos;
use App\Models\ville;
use App\Models\Option;
class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom',"description","adresse","telephone","fax","email","ville_id",'photo',"etoile","prix"];
    public function getAllphotos(){
        return photos::where([['type',2],['type_id',$this->id]])->get();
    }
    public function ville(){
        return $this->belongsTo(ville::class);
    }
    public function Options()
    {
        return $this->belongsToMany(Option::class);
    }
}
