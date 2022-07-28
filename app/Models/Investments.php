<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investments extends Model
{
    use HasFactory;

    protected $table="investments";

    protected $fillable=['project','value','involvedInvestment','date','power','result'];


}
