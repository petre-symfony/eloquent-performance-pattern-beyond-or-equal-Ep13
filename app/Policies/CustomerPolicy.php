<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;

class CustomerPolicy {
    /**
     * Create a new policy instance.
     */
    public function __construct() {
        //
    }

    public function view(User $user, Customer $customer) {
        return $user->is_owner || $user->id === $customer->sales_rep_id;
    }
}
