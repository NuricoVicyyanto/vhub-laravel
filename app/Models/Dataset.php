<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dataset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'data_type',
        'documentation',
        'source_url',
        'status',
        'contributor_name',
        'contributor_email',
    ];
}
