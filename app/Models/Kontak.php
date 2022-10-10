<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table='kontak';
    protected $primaryKey='id';

    protected $fillable =[
        'no_wa',
        'email',
        'alamat',
        'link_fb',
        'link_ig'
    ];
}