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
     * Privileges are automatically associated with the "privileges" table.
     *
     * @var string
     */
    protected $table = 'privileges';

    /**
     * "One privilege can be assigned to many roles" relationship.
     * A privilege can be assigned to many roles via the pivot table "role_privilege".
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_privilege');
    }

    /**
     * Method to normalize the name of a privilege before saving.
     * For example, we might want to convert it to lowercase.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($privilege) {
            $privilege->name = strtolower($privilege->name);
        });
    }
}
