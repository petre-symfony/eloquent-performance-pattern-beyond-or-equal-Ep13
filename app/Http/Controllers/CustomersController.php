<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Customer;

class CustomersController extends Controller {
    public function index() {
        Auth::login(User::where('name', 'Ted Bossman')->first());

        $customers = Customer::with('salesRep')
            ->visibleTo(Auth::user())
            ->orderBy('name')
            ->paginate();

        return view('customers.index', ['customers' => $customers]);
    }
}
