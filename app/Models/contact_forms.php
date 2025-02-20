<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact_forms extends Model
{
    // Define the table name if necessary
    protected $table = 'contact_forms';  // This is optional because Laravel assumes 'contact_forms'

    // Specify the fillable attributes to allow mass-assignment
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'message',
    ];

    // Optionally, specify the timestamps if they are disabled
    public $timestamps = true;  // By default, Laravel will automatically manage created_at and updated_at

    // You can also add any custom methods or relationships here if needed.
}
