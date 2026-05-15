<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'type',
        'pdf_path',
    ];

    /**
     * Get the order that owns the document.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
