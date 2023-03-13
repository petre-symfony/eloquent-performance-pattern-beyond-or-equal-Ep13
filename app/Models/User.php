<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Login;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Customer;
use App\Models\Company;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Ep13

    public function customer() {
        return $this->hasMany(Customer::class, 'sales_rep_id');
    }
     */

    /** Ep 15
     * public function company() {
     * return $this->hasOne(Company::class);
     * }
     */

    /** Ep16
     * public function company() {
     * return $this->belongsTo(Company::class);
     * }
     */

    /** Ep17
     * public function logins() {
     * return $this->hasMany(Login::class);
     * }
     *
     * public function lastLogin() {
     * return $this->belongsTo(Login::class);
     * }
     *
     * public function scopeWithLastLogin($query) {
     * $query->addSelect(['last_login_id' => Login::select('id')
     * ->whereColumn('user_id', 'users.id')
     * ->latest()
     * ->take(1),
     * ])->with('lastLogin');
     * }
     *
     * public function scopeorderByLastLogin($query){
     * $query->orderByDesc(
     * Login::select('created_at')
     * ->whereColumn('user_id', 'users.id')
     * ->latest()
     * ->take(1)
     * );
     * }
     */

    /** Ep18
    public function books() {
        return $this->belongsToMany(Book::class, 'checkouts')
            ->using(Checkout::class)
            ->withPivot('borrowed_date');
    }
     */
}
