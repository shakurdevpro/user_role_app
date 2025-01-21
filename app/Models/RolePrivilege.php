<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePrivilege extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['role_id', 'privilege_id'];

    /**
     * The table associated with this model.
     *
     * @var string
     */
    protected $table = 'role_privilege';

    /**
     * Relationship with the Role model.
     * A RolePrivilege belongs to a role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relationship with the Privilege model.
     * A RolePrivilege belongs to a privilege.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function privilege()
    {
        return $this->belongsTo(Privilege::class);
    }
}
