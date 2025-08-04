<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Transaction extends Model
{
    use HasUuids;

    protected $fillable = [
        'uuid',
        'description',
        'amount',
        'user_id',
        'category_id',
        'date',
    ];

    protected $appends = [
        'display_amount',
        'format_date',
    ];

    /**
     * Get the display amount formatted as a string.
     *
     * @return string
     */
    public function getDisplayAmountAttribute()
    {
        return Number::currency($this->amount, 'VND');
    }

    /**
     * Get the formatted date.
     *
     * @return string
     */
    public function getFormatDateAttribute()
    {
        return Carbon::parse($this->date)->format('d/m/Y');
    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
