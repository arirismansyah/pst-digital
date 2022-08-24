<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $fillable = [
        'nama',
        'email',
        'jk',
        'latar_belakang',
        'latar_belakang_lainnya',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $user = Auth::user();
            $model->created_by = $user->username;
            $model->updated_by = $user->username;
        });
        static::saving(function ($model) {
            $user = Auth::user();
            $model->updated_by = $user->username;
        });
    }

    public function get_latar_belakang(){
        return $this->belongsTo(LatarBelakang::class, 'latar_belakang', 'id');
    }

    public function jenis_kelamin(){
        return $this->belongsTo(JenisKelamin::class, 'jk', 'id');
    }
}
