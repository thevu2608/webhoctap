<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Info;
use App\Models\Movie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        //count
        $category_sum = Category::all()->count();
        $genre_sum = Genre::all()->count();
        $country_sum = Country::all()->count();
        $movie_sum = Movie::all()->count();

        $info = Info::find(1);
        View::share([
            'category_sum' => $category_sum,
            'genre_sum' => $genre_sum,
            'country_sum' => $country_sum,
            'info' => $info,
            'category_home' => $category,
            'genre_home' => $genre,
            'country_home' => $country,
            'phimhot_trailer' => $phimhot_trailer,
            'phimhot_slidebar' => $phimhot_slidebar,
            'movie_sum' => $movie_sum
        ]);
    }
}
