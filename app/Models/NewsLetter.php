<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $fillable = ['email'];

    protected $table = 'news_letters';

    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }
}
