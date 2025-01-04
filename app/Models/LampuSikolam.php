<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LampuSikolam extends Model
{
    use HasFactory;
    protected $table = 'lampu_sikolam'; // Pastikan nama tabel sesuai
    protected $fillable = ['name', 'relay', 'timeon', 'timeoff', 'status'];
}
