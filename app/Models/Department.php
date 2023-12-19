<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'PhongBan';
    protected $primaryKey = 'MaPB';

    protected $fillable = [
        'TenPB'
    ];

    public $timestamps = false;

    public function staffs()
    {
        return $this->hasMany(User::class, 'MaPB', 'MaPB');
    }
}
