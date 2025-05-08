<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    // Champs remplissables
    protected $fillable = ['username', 'password'];

    // Cacher le mot de passe lors de l'affichage de l'utilisateur
    protected $hidden = ['password'];

    // Le mot de passe doit être haché avant d'être stocké dans la base de données
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
