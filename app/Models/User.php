<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'NhanVien';
    protected $primaryKey = 'MaNV';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'PasswordNV',
        'TenNV',
        'DiachiNV',
        'NgaysinhNV',
        'EmailNV',
        'PhanquyenNV',
        'ChucvuNV',
        'MaPB'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'PasswordNV'
    ];

    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo(Department::class, 'MaPB', 'MaPB');
    }
}
