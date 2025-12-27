<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'contact_details';

    // Primary key of the table
    protected $primaryKey = 'id';

    // Columns that are mass assignable
    protected $fillable = [
        'email',
        'phone',
        'whatsapp',
        'facebook',
        'twitter',
        'linkedin',
        'behance',
        'website',
        'instagram',
        'clients',
    ];

    // Automatically manage created_at and updated_at timestamps
    public $timestamps = true;
}
