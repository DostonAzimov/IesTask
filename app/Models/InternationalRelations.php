<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalRelations extends Model
{
    use HasFactory;

    protected $table="international_relations";

    protected $fillable=['logo','webSayt','description'];
}
