<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'Detail';
    protected $guarded = ['id'];

    protected $fillable = [
        'tipe',
        'tanggal',
        'jam',
        'subjective',
        'objective',
        'assessment',
        'planning',
        'instruksi',
        'role',
        'obat',
        'klinik_id',
    ];

    public function klinik() {
        return $this->belongsTo(Klinik::class, 'klinik_id');
    }
}
