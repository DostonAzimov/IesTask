<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IesAj extends Model
{
    use HasFactory;

    protected $table="ies_ajs";

    protected $fillable=['description','images'];
}
