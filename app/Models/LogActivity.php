<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    /**
     * Les attributs qui peuvent être attribués en masse.
     *
     * @var list<string>
     */
    protected $fillable = ['user_id', 'action', 'details', 'ip_address', 'user_agent'];

    /**
     * Relation avec le modèle User.
     * Un LogActivity appartient à un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
