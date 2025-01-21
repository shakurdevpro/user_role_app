<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name'];

    /**
     * Les rôles sont automatiquement associés à la table "roles".
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Relation "un rôle appartient à plusieurs utilisateurs".
     * Un rôle peut être attribué à plusieurs utilisateurs via la table pivot "user_role".
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }

    /**
     * Relation "un rôle a plusieurs privilèges".
     * Un rôle peut avoir plusieurs privilèges via la table pivot "role_privilege".
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function privileges()
    {
        return $this->belongsToMany(Privilege::class, 'role_privilege');
    }

    /**
     * Indiquer si l'attribut 'name' est unique.
     * Cela est géré via la migration et validé au niveau de la base de données.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            $role->name = strtolower($role->name);
        });
    }
}
