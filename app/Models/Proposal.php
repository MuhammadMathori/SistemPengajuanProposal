<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Proposal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'proposals';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'judul',
        'mahasiswa_id',
        'dosen_id',
        'file_proposal',
        'status',
        'disetujui',
        'submitted_at',
    ];

    protected $casts = [
        'disetujui' => 'boolean',
        'submitted_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Relasi Proposal milik Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    // Relasi Proposal milik Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
