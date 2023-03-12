<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Book;
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
    public function index() {
        $books = Book::select('books.*')
            ->join('checkouts', 'checkouts.book_id', '=', 'books.id')
            ->groupBy('books.id')
            ->orderByRaw('max(checkouts.borrowed_date) desc')
            ->withLastCheckout()
            ->with('lastCheckout.user')
            ->paginate();

        return view('books.index', ['books' => $books]);
    }
}
