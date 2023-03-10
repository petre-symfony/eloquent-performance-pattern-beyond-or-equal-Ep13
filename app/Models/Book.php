<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    use HasFactory;

    /** Ep18
    public function user() {
        return $this->belongsToMany(User::class, 'checkouts')
            ->using(Checkout::class)
            ->withPivot('borrowed_date');
    }

    public function lastCheckout() {
        return $this->belongsTo(Checkout::class);
    }

    public function scopeWithLastCheckout($query) {
        $query->addSelect(['last_checkout_id' => Checkout::select('checkouts.id')
            ->whereColumn('book_id', 'books.id')
            ->latest('borrowed_date')
            ->limit(1),
        ])->with('lastCheckout');
    }
     */

    public function user() {
        return $this->belongsTo(User::class);
    }
}
