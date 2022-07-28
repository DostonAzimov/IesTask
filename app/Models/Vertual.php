<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vertual extends Model
{
    use HasFactory;

    protected $table='vertuals';

    protected $fillable=['fullName','dateOfBirth','passport','region',
        'district','address','email','secret','phoneNumber','status'];
}
