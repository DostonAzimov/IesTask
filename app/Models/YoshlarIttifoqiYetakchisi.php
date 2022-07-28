<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoshlarIttifoqiYetakchisi extends Model
{
    use HasFactory;

    protected $table="yoshlar_ittifoqi_yetakchisis";

    protected $fillable=['title','fullName','description','image','phoneNumber'];
}
