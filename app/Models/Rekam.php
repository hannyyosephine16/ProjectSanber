<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Rekam extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'Rekam';
    protected $guarded = ['id'];
    public $sortable = [
        'nama', 'tgllahir',
    ];
}
