<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informasi extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'informasi';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'lokasi',
        'email',
        'telepon',
        'waktukerja',
        'namapt',
    ];
}
