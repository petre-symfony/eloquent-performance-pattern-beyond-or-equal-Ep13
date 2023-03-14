<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Feature;

class FeaturesController extends Controller {
    public function index() {
        $features = Feature::withCount('comments', 'votes')
            ->when(request('sort'), function ($query, $sort) {
                switch($sort) {
                    case 'title': return $query->orderBy('title', request('direction'));
                    case 'status': return $query->orderByStatus(request('direction'));
                    case 'activity': return $query->orderByActivity(request('direction'));
                }
            })
            ->latest()
            ->paginate();

        return view('features.index', ['features' => $features]);
    }
}
