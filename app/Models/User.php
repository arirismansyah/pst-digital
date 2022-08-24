<?php

namespace App\Models;

use Doctrine\Inflector\Rules\Substitution;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'fungsi',
        'email',
        'password',
        'instansi',
        'last_seen',
        'update_by',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $guard_name = 'pst_online';

    protected static function booted()
    {
        $user = Auth::user();
        if($user){
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
        
    }

    public function get_fungsi(){
        return $this->belongsTo(Subjectmatter::class, 'fungsi', 'id');
    }
}
