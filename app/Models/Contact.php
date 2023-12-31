<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'businessEmail',
        'title',
        'companyName',
        'companySize',
        'country',
        'phoneNumber',
        'message',
        'consent',
        'consent2',
        'status'
    ];
}
