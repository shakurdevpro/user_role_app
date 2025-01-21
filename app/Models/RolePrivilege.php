<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePrivilege extends Pivot
{
    /**
     * Les attributs qui peuvent être attribués en masse.
     *
     * @var list<string>
     */
    protected $fillable = ['role_id', 'privilege_id'];

    /**
     * La table associée à ce modèle.
     *
     * @var string
     */
    protected $table = 'role_privilege';

    /**
     * Relation avec le modèle Role.
     * Un RolePrivilege appartient à un rôle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relation avec le modèle Privilege.
     * Un RolePrivilege appartient à un privilège.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function privilege()
    {
        return $this->belongsTo(Privilege::class);
    }
}
