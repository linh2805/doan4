<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{    // Define the table name if necessary
    protected $table = 'contacts';  // This is optional because Laravel assumes 'contact_forms'

    // Specify the fillable attributes to allow mass-assignment
    protected $fillable = [
        'fullname',  // Tên trường này không khớp với form
        'phone',
        'email',
        'message',
    ];

    // Optionally, specify the timestamps if they are disabled
    public $timestamps = true;  // By default, Laravel will automatically manage created_at and updated_at

    // You can also add any custom methods or relationships here if needed.
}
