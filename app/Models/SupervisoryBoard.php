<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisoryBoard extends Model
{
    use HasFactory;

    protected $table="supervisory_boards";

    protected $fillable=['position','workplace','fullName'];
}
