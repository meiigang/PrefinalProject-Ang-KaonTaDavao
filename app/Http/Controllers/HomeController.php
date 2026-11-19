<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Eatery;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $eateryCount = Eatery::count();
        $districtCount = District::count();
        $reviewCount = Review::count();

        $topEateries = Eatery::query()
            ->has('reviews')
            ->with(['district', 'features'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->limit(3)
            ->get();

        return view('home', [
            'eateryCount' => $eateryCount,
            'districtCount' => $districtCount,
            'reviewCount' => $reviewCount,
            'topEateries' => $topEateries,
        ]);
    }
}
