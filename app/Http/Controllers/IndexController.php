<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function timkiem()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
            $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
            $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();


            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('date_update', 'DESC')->paginate(40);

            return view('pages/timkiem', compact('genre', 'country', 'category', 'search', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
        } else {
            return redirect()->to('/');
        }
    }
    public function home()
    {
        $phim_hot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages/home', compact('genre', 'country', 'category', 'category_home', 'phim_hot', 'phimhot_slidebar', 'phimhot_trailer'));
    }
    public function category($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/category', compact('genre', 'country', 'category', 'cate_slug', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
    }
    public function tag($tag)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $tag = $tag;
        $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/tag', compact('genre', 'country', 'category', 'tag', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
    }
    public function year($year)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/year', compact('genre', 'country', 'category', 'year', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
    }
    public function genre($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $manny_genre = [];
        foreach ($movie_genre as $key => $value) {
            $manny_genre[] = $value->movie_id;
        }
        $movie = Movie::whereIn('id', $manny_genre)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/genre', compact('genre', 'country', 'category', 'genre_slug', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
    }
    public function country($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $country_slug->id)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/country', compact('genre', 'country', 'category', 'country_slug', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
    }
    public function movie($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('genre', 'category', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $episode_first = Episode::with('movie')->where('movie_id', $movie->id)->first();
        $movie_related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)
            ->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();
        return view('pages/movie', compact('genre', 'country', 'category', 'movie', 'movie_related', 'phimhot_slidebar', 'phimhot_trailer', 'episode', 'episode_first'));
    }
    public function watch($slug, $tap)
    {


        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $movie = Movie::with('genre', 'category', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        if (isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap, 4, 1);
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        } else {
            $tapphim = 1;
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();

        }
        return view('pages/watch', compact('category', 'phimhot_slidebar', 'phimhot_trailer', 'genre', 'movie', 'country', 'episode', 'tapphim'));
    }
    public function episode()
    {
        return view('pages/episode');
    }
}
