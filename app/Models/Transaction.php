<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     public $timestamps = false;
    use HasFactory;

    // Pastikan field yang bisa diisi mass assignment ada di sini
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }


}

