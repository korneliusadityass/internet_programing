<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\role;
use App\Models\department;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'email', 'alamat', 'gaji', 'tanggal_lahir', 'nohp', 'password', 'id_role','id_department'];

    public function role()
    {
        return $this->belongsTo(role::class, 'id_role', 'id'); // Perhatikan urutan parameter
    }

    public function department()
    {
        return $this->belongsTo(department::class, 'id_department', 'id'); // Perhatikan urutan parameter
    }
}