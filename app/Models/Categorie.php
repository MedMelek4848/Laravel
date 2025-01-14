<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable=[
        "nomCategorie",
        "imageCategorie"
    ];
    public function scategorie(){
        return $this->hasMany(SCategorie::class,"categorieID");
    }
}
