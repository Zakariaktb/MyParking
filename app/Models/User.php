<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table="users";
    protected $fillable=["name","phone","car_plate","service",];
    public $timestamps=false;
}
