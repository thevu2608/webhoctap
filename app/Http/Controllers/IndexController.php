<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Rating;
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


            $movie = Movie::withCount('episode')->where('title', 'LIKE', '%' . $search . '%')->orderBy('date_update', 'DESC')->paginate(40);

            return view('pages/timkiem', compact('genre', 'country', 'category', 'search', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
        } else {
            return redirect()->to('/');
        }
    }
    public function home()
    {
        $phim_hot = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $category_home = Category::with(['movie' => function ($q) {
            $q->withCount('episode')->where('status', 1);
        }])->orderBy('id', 'DESC')->where('status', 1)->get();
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
        $movie = Movie::withCount('episode')->where('status', 1)->where('category_id', $cate_slug->id)->orderBy('date_update', 'DESC')->paginate(12);
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
        $movie = Movie::withCount('episode')->where('tags', 'LIKE', '%' . $tag . '%')->orderBy('date_update', 'DESC')->paginate(12);
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
        $movie = Movie::withCount('episode')->where('status', 1)->where('year', $year)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/year', compact('genre', 'country', 'category', 'year', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
    }
    public function genre($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $manny_genre = [];
        foreach ($movie_genre as $key => $value) {
            $manny_genre[] = $value->movie_id;
        }
        $movie = Movie::withCount('episode')->where('status', 1)->whereIn('id', $manny_genre)->orderBy('date_update', 'DESC')->paginate(12);
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
        $movie = Movie::withCount('episode')->where('status', 1)->where('country_id', $country_slug->id)->orderBy('date_update', 'DESC')->paginate(12);
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
        //Lấy 3 tập gần nhất
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();
        // lấy tổng tập đã thêm
        $episode_list = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_count = $episode_list->count();

        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id', $movie->id)->count();

        return view('pages/movie', compact(
            'genre',
            'country',
            'category',
            'movie',
            'movie_related',
            'phimhot_slidebar',
            'phimhot_trailer',
            'episode',
            'episode_first',
            'episode_count',
            'rating',
            'count_total'
        ));
    }
    public function add_rating(Request $request){
        $data = $request->all();
        $ip_address = $request->ip();

        $rating_count = Rating::where('movie_id', $data['movie_id'])->where('ip_address', $ip_address)->count();
        if ($rating_count>0) {
            echo 'exist';
        }else{
            $rating = new Rating();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            echo 'done';
        }
    }
    public function watch($slug, $tap)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $phimhot_slidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $movie = Movie::with('genre', 'category', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        $movie_related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)
            ->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        //Lấy tập 1
        if (isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap, 4, 20);
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        } else {
            $tapphim = 1;
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        }
        return view('pages/watch', compact(
            'category',
            'phimhot_slidebar',
            'phimhot_trailer',
            'genre',
            'movie',
            'country',
            'episode',
            'tapphim',
            'movie_related'
        ));
    }
    public function episode()
    {
        return view('pages/episode');
    }
    public function locphim()
    {
        $sapxep = $_GET['order'];
        $genre_get = $_GET['genre'];
        $country_get = $_GET['country'];
        $year_get = $_GET['year'];

        if ($sapxep == '' && $genre_get == '' && $country_get == '' && $year_get == '') {
            return redirect()->back();
        } else {
            $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();
            $phimhot_slidebar = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->take(15)->get();
            $phimhot_trailer = Movie::where('resolution', 4)->where('status', 1)->orderBy('date_update', 'DESC')->take(10)->get();


            // Lấy dữ liệu
            $movie = Movie::withCount('episode');
            if ($genre_get) {
                $movie = $movie->where('genre_id', '=', $genre_get);
            } elseif ($country_get) {
                $movie = $movie->where('country_id', '=', $country_get);
            } elseif ($year_get) {
                $movie = $movie->where('year', '=', $year_get);
            } elseif ($sapxep) {
                $movie = $movie->orderBy('title', 'ASC');
            }
            $movie = $movie->orderBy('date_update', 'DESC')->paginate(40);
            return view('pages/locphim', compact('genre', 'country', 'category', 'movie', 'phimhot_slidebar', 'phimhot_trailer'));
        }
    }
}
