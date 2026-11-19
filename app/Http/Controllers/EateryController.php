<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Eatery;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EateryController extends Controller
{
    public function index(Request $request): View
    {
        $eateries = Eatery::query()
            ->with(['district', 'features'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating');

        if ($request->filled('q')) {
            $search = $request->q;
            $eateries->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('specialty', 'like', "%{$search}%");
            });
        }

        if ($request->filled('district')) {
            $eateries->where('district_id', $request->district);
        }

        if ($request->filled('feature')) {
            $eateries->whereHas('features', function ($query) use ($request) {
                $query->where('name', $request->feature);
            });
        }

        $eateries = $eateries->orderBy('name')->paginate(6)->withQueryString();
        $districts = District::orderBy('name')->get();
        $features = Feature::orderBy('name')->get();

        return view('eateries.index', compact('eateries', 'districts', 'features'));
    }

    public function create(): View
    {
        return view('eateries.create');
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function show(Eatery $eatery): View
    {
        $eatery->load([
            'district',
            'permit',
            'features',
            'dishes',
            'reviews' => fn ($query) => $query->latest(),
            'reviews.user',
        ]);

        $users = User::orderBy('name')->get();

        return view('eateries.show', compact('eatery', 'users'));
    }

    public function edit(Eatery $eatery): View
    {
        return view('eateries.edit', compact('eatery'));
    }

    public function update(Request $request, Eatery $eatery)
    {
        abort(404);
    }

    public function destroy(Eatery $eatery)
    {
        abort(404);
    }
}
