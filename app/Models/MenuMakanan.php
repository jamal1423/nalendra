<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuMakanan extends Model
{
    use HasFactory;

    protected $table='menu_makanan';
    protected $primaryKey='id';

    protected $fillable =[
        'nama_barang',
        'harga_barang',
        'userlog',
        'jenis'
    ];
}
