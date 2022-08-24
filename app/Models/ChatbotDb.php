<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChatbotDb extends Model
{
    use HasFactory;
    protected $table = 'chatbot_db';

    protected $fillable = [
        'pattern',
        'response',
        'type',
        'api_id',
        'api_title',
        'api_cover',
        'api_download',
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
}
