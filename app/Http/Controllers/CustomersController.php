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
        Auth::login(User::where('name', 'Sarah Seller')->first());

        $customers = Customer::with('salesRep')
            ->orderBy('name')
            ->get()
            ->filter(function ($customer){
                return Auth::user()->can('view', $customer);
            });

        return view('customers.index', ['customers' => $customers]);
    }
}
