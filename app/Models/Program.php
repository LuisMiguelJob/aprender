<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\User;

class Program extends Model
{
    use HasFactory;
    protected $fillable = ['calendario', 'folio', 'nombre', 'dependencia', 'titular', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function lenders(){
        return $this->belongsToMany(Lender::class);
    }
}
