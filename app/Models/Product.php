<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    use HasFilter;

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    /**
     * Get the user's order date.
     *
     * @param string $value
     * @return string
     */
    public function getUserOrderDateAttribute(): ?string
    {
        $userId = request()->input('user_id');

        if (!$userId) {
            return null;
        }

        $orderItem = OrderItem::with('order')
            ->whereHas('order', function ($query) use ($userId) {
                $query->where('user_id', '=', $userId);
            })
            ->where('product_id', $this->id)
            ->first();

        if (!$orderItem) {
            return null;
        }

        return Carbon::parse($orderItem->created_at)->format('d-m-Y');
    }


    /**
     * Get the action type.
     *
     * @param string $value
     * @return string
     */
    public function getActionTypeAttribute(): string
    {
        return "link";
    }

    /**
     * Get the action.
     *
     * @param string $value
     * @return string
     */
    public function getActionAttribute(): string
    {
        return "shop/product";
    }
}
