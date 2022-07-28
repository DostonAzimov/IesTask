<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missiya extends Model
{
    use HasFactory;

    protected $table="missiyas";

    protected $fillable=['title','description','images','file'];
}
