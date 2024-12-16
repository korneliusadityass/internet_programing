<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class role extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $table = 'role';
    protected $fillable = [
        'nama',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_role', 'id');
    }
}