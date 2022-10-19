<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use App\Models\LoginHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();
        $query = Film::query()
            ->with(['user', 'genres'])
            ->latest();

        if ($request->has('genres')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('genres.id', $request->get('genres'));
            });
        }

        if ($request->has('actors')) {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->whereIn('actors.id', $request->get('actors'));
            });
        }

        if ($request->has('name')) {
            $search = '%' . $request->get('name') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', $search);
            });
        }

        if ($request->has('year')) {
            $search = '%' . $request->get('year') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('year', 'like', $search);
            });
        }

        $films = $query
            ->paginate(3)
            ->appends($request->query());

        $genres = Genre::all();
        $actors = Actor::all();

        return view('welcome', compact('films', 'genres', 'actors'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function showLoginHistory(Request $request)
    {
        $logins = LoginHistory::query()->where('user_id', Auth::id())->paginate(8);

        return view('login-history', ['logins' => $logins]);
    }
}
