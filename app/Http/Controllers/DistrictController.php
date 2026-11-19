<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\View\View;

class DistrictController extends Controller
{
    public function index(): View
    {
        $districts = District::withCount('eateries')->orderBy('name')->get();

        return view('districts.index', compact('districts'));
    }

    public function show(District $district): View
    {
        $district->loadCount('reviews');
        $district->load([
            'eateries' => function ($query) {
                $query->with(['district', 'features'])
                    ->withCount('reviews')
                    ->withAvg('reviews', 'rating')
                    ->orderBy('name');
            },
        ]);

        return view('districts.show', compact('district'));
    }
}
