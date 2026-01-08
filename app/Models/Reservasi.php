<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservasi extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'reservasi';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_pengguna',
        'id_layanan',
        'id_dokter',
    ];

    /**
     * Get the pengguna that owns the reservasi.
     */
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    /**
     * Get the layanan for the reservasi.
     */
    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    /**
     * Get the dokter for the reservasi.
     */
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    /**
     * Get all riwayat for the reservasi.
     */
    public function riwayat(): HasMany
    {
        return $this->hasMany(RiwayatReservasi::class, 'id_reservasi');
    }
}
