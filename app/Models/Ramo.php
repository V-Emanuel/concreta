<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ramo extends Model
{
    protected $table = 'ramos';
    protected $fillable = ['id', 'nome'];
}