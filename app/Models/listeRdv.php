<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class listeRdv extends Model
{
    protected $fillables=['matricule','motif','service','date'];
}
