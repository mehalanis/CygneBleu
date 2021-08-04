<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\billet;
class BilletDate extends Model
{
    use HasFactory;
    protected $fillable = ['id',"billet_id","depart","retour","type","class","prix"];
    protected $dates = [
        'depart',
        'retour'
    ];
    protected $casts =[
        "depart"=> "datetime:d/m/Y H:i",
        "retour"=> "datetime:d/m/Y H:i"
    ];
    public function billet(){
        return $this->belongsTo(billet::class);
    }
}
