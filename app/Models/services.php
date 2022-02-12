<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class services extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'price',
        'description',
    ];




}
