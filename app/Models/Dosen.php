<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Dosen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dosen';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'nip',
        'kontak',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'kontak' => 'array',
        'is_active' => 'boolean',
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

    // Relasi Dosen memiliki banyak Proposal
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'dosen_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
