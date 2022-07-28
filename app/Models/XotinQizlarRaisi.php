<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XotinQizlarRaisi extends Model
{
    use HasFactory;

    protected $table="xotin_qizlar_raisis";

    protected $fillable=['title','fullName','description','image'];
}
