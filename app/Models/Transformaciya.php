<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transformaciya extends Model
{
    use HasFactory;

    protected $table="transformaciyas";

    protected $fillable=['description','images','file'];
}
