<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name'];

    /**
     * Les privilèges sont automatiquement associés à la table "privileges".
     *
     * @var string
     */
    protected $table = 'privileges';

    /**
     * Relation "un privilège peut être attribué à plusieurs rôles".
     * Un privilège peut être attribué à plusieurs rôles via la table pivot "role_privilege".
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_privilege');
    }

    /**
     * Méthode pour normaliser le nom d'un privilège avant de le sauvegarder.
     * Par exemple, on pourrait vouloir le convertir en minuscules.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($privilege) {
            $privilege->name = strtolower($privilege->name); 
        });
    }
}
