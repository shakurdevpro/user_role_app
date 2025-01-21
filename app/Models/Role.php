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
     * Roles are automatically associated with the "roles" table.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * "One role belongs to many users" relationship.
     * A role can be assigned to many users via the pivot table "user_role".
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }

    /**
     * "One role has many privileges" relationship.
     * A role can have many privileges via the pivot table "role_privilege".
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function privileges()
    {
        return $this->belongsToMany(Privilege::class, 'role_privilege');
    }

    /**
     * Ensure the 'name' attribute is unique.
     * This is handled via the migration and validated at the database level.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            $role->name = strtolower($role->name);
        });
    }
}
