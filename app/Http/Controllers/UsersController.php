<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Company;
use App\Models\Login;
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

        /** Ep15, Ep16
        $users = User::select('users.*')
            ->join('companies', 'companies.user_id', '=', 'users.id')
            ->orderBy('companies.name')
            ->with('company')
            ->paginate();
         */

        /** Ep17
        $users = User::orderByLastLogin()
            ->withLastLogin()
            ->paginate();

        return view('users.index', ['users' => $users]);
        */

        /** Ep19
        $users = User::
            when(request('sort') === 'town', function ($query){
                if (config('database.default') === 'mysql' || config('database.default') === 'sqlite') {
                    $query
                        ->orderByRaw('town is null')
                        ->orderBy('town', request('direction'));
                }
                if (config('database.default') === 'pgsql') {
                    $query->orderByNullsLast('town', request('direction'));
                }
            })
            ->orderBy('name')
            ->paginate();

        return view('users.index', ['users' => $users]);
         */
    }
}
