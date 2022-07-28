<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RivojlanishStrategiyasi extends Model
{
    use HasFactory;

    protected $table="rivojlanish_strategiyasis";

    protected $fillable=['description','images','file'];
}
