<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Customer;

class UsersController extends Controller {
    public function index() {
        /** Ep14
        $users = User::orderBy('first_name')
            ->orderBy('last_name')
            ->paginate();
        */

        /** Ep15
        $users = User::select('users.*')
            ->join('companies', 'companies.user_id', '=', 'users.id')
            ->orderBy('companies.name')
            ->with('company')
            ->paginate();
         */

        $users = User::orderBy(
                Company::select('name')
                    ->whereColumn('id', 'users.company_id')
                    ->orderBy('name')
                    ->take(1)
            )
            ->with('company')
            ->paginate();

        return view('users.index', ['users' => $users]);

    }
}
