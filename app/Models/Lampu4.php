<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampu4 extends Model
{
    use HasFactory;
    protected $table = 'lampu_4'; // Pastikan nama tabel sesuai
    protected $fillable = ['name', 'relay', 'timeon', 'timeoff', 'status'];
}
