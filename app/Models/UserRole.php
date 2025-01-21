<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRole extends Pivot
{
    /**
     * Les attributs qui peuvent être attribués en masse.
     *
     * @var list<string>
     */
    protected $fillable = ['user_id', 'role_id'];

    /**
     * La table associée à ce modèle.
     *
     * @var string
     */
    protected $table = 'user_role';

    /**
     * Relation avec le modèle User.
     * Un UserRole appartient à un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le modèle Role.
     * Un UserRole appartient à un rôle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
