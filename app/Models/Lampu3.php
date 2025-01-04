<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampu3 extends Model
{
    use HasFactory;
    protected $table = 'lampu_3'; // Pastikan nama tabel sesuai
    protected $fillable = ['name', 'relay', 'timeon', 'timeoff', 'status'];
}
