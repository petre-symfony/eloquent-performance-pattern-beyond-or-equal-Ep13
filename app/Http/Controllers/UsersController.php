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

class UsersController extends Controller {
    public function index() {
        $users = User::orderBy('first_name')
            ->orderBy('last_name')
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
