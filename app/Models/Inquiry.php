<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'country',
        'company_name',
        'phone',
        'reason_for_contact',
        'inquiry',
    ];

    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }

    public function scopeCompanyName($query, $companyName)
    {
        return $query->where('company_name', $companyName);
    }
}
