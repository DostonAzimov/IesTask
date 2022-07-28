<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustav extends Model
{
    use HasFactory;

    protected $table="ustavs";

    protected $fillable=['file'];
}
