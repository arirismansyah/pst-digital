<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LatarBelakang extends Model
{
    use HasFactory;

    protected $table = 'latar_belakang_customer';

    protected $fillable = [
        'latar_belakang',
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

    public function customer(){
        return $this->hasMany(Customer::class, 'id', 'latar_belakang');
    }
}
