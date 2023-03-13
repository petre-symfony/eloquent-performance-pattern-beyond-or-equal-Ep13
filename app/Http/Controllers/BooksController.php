<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Book;
use App\Models\Checkout;
use App\Models\Company;
use App\Models\Login;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Customer;

class BooksController extends Controller {
    /** Ep18
    public function index() {
        $books = Book::
            orderBy(User::select('name')
                ->join('checkouts', 'checkouts.user_id', '=', 'users.id')
                ->whereColumn('checkouts.book_id', 'books.id')
                ->latest('checkouts.borrowed_date')
                ->take(1)

            )
            ->withLastCheckout()
            ->with('lastCheckout.user')
            ->paginate();

        return view('books.index', ['books' => $books]);
    }
     */
}
