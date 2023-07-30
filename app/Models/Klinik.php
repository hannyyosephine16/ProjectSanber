<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Klinik extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'Klinik';
    protected $guarded = ['id'];

    public $sortable = [
        'nama', 'tgllahir',
    ];

    protected $fillable = [
        'nama',
        'nik',
        'tgllahir',
        'telepon',
    ];
}
