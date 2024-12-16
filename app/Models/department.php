<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class department extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $table = 'department';
    protected $fillable = [
        'nama',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_department', 'id');
    }
}