<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memo extends Model
{
    use HasFactory;
    protected $fillable = ['mata_kuliah', 'deskripsi', 'semester',];
    protected $table = 'memo';   
    public $timestamps = false;
}
