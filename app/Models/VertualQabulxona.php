<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VertualQabulxona extends Model
{
    use HasFactory;

    protected $table="vertual_qabulxonas";

    protected $fillable=['name','phoneNumber','email','description'];
}
