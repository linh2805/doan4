<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    // Define the table name if necessary
    protected $table = 'registrations';  // This is optional because Laravel will assume 'registrations'

    // Specify the fillable attributes to allow mass-assignment
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'high_school',
        'residence',
        'major',
    ];
}
