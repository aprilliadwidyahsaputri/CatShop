<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transaction';
    public $incrementing = true;
    protected $fillable = ['nama', 'category_id', 'harga', 'tanggal'];
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id_categories');
    }

}
