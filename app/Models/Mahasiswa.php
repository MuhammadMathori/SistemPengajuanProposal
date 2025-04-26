<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Mahasiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mahasiswa';
    protected $keyType = 'string'; // Karena UUID
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'nim',
        'alamat',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'alamat' => 'array', // otomatis cast json ke array
        'is_active' => 'boolean',
    ];

    // Auto generate UUID saat membuat
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Relasi Mahasiswa memiliki banyak Proposal
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'mahasiswa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
