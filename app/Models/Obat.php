<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Obat extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'Obat';
    protected $guarded = ['id'];

    public $sortable = [
        'nama', 'sediaan', 'golongan'
    ];

    protected $fillable = [
        'nama',
        'sediaan',
        'golongan',
        'harga',
        'jumlah',
    ];
}
