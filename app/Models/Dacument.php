<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dacument extends Model
{
    use HasFactory;

    protected $table="dacuments";

    protected $fillable=['title','file'];
}
