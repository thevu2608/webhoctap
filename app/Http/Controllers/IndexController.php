<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Info;
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

            $movie = Movie::withCount('episode')->where('title', 'LIKE', '%' . $search . '%')->orderBy('date_update', 'DESC')->paginate(40);

            return view('pages/timkiem', compact('search', 'movie'));
        } else {
            return redirect()->to('/');
        }
    }
    public function home()
    {
        $info = Info::find(1);
        $meta_title = $info->title;
        $meta_description = $info->description;
        $phim_hot = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('date_update', 'DESC')->get();

        $category_home = Category::with(['movie' => function ($q) {
            $q->withCount('episode')->where('status', 1);
        }])->orderBy('id', 'DESC')->where('status', 1)->get();

        return view('pages/home', compact('category_home', 'phim_hot', 'meta_title', 'meta_description'));
    }
    public function category($slug)
    {
        $cate_slug = Category::where('slug', $slug)->first();
        $meta_title = $cate_slug->title;
        $meta_description = $cate_slug->description;
        $movie = Movie::withCount('episode')->where('status', 1)->where('category_id', $cate_slug->id)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/category', compact('cate_slug', 'movie', 'meta_title', 'meta_description'));
    }
    public function tag($tag)
    {
        $tag = $tag;
        $meta_title = $tag;
        $meta_description = $tag;
        $movie = Movie::withCount('episode')->where('tags', 'LIKE', '%' . $tag . '%')->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/tag', compact('tag', 'movie', 'meta_title', 'meta_description'));
    }
    public function year($year)
    {
        $meta_title = 'Năm phim: ' . $year;
        $meta_description = 'Tìm phim năm: ' . $year;
        $year = $year;
        $movie = Movie::withCount('episode')->where('status', 1)->where('year', $year)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/year', compact('year', 'movie', 'meta_description', 'meta_title'));
    }
    public function genre($slug)
    {
        $genre_slug = Genre::where('slug', $slug)->first();
        $meta_title = $genre_slug->title;
        $meta_description = $genre_slug->description;
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $manny_genre = [];
        foreach ($movie_genre as $key => $value) {
            $manny_genre[] = $value->movie_id;
        }
        $movie = Movie::withCount('episode')->where('status', 1)->whereIn('id', $manny_genre)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/genre', compact('genre_slug', 'movie','movie_genre', 'meta_title', 'meta_description'));
    }
    public function country($slug)
    {
        $country_slug = Country::where('slug', $slug)->first();
        $meta_title = $country_slug->title;
        $meta_description = $country_slug->description;
        $movie = Movie::withCount('episode')->where('status', 1)->where('country_id', $country_slug->id)->orderBy('date_update', 'DESC')->paginate(12);
        return view('pages/country', compact('country_slug', 'movie', 'meta_title', 'meta_description'));
    }
    public function movie($slug)
    {
        $movie = Movie::with('genre', 'category', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $meta_title = $movie->title;
        $meta_description = $movie->description;
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
        $count_view = $movie->count_view;
        $count_view = $count_view + 1;
        $movie->count_view = $count_view;
        $movie->save();

        return view('pages/movie', compact(
            'movie','movie_related','episode',
            'episode_first','episode_count','rating',
            'count_total', 'meta_title', 'meta_description'
        ));
    }
    public function add_rating(Request $request)
    {
        $data = $request->all();
        $ip_address = $request->ip();

        $rating_count = Rating::where('movie_id', $data['movie_id'])->where('ip_address', $ip_address)->count();
        if ($rating_count > 0) {
            echo 'exist';
        } else {
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
        $movie = Movie::with('genre', 'category', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        $meta_title = 'Xem phim: '. $movie->title;
        $meta_description = $movie->description;
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
            'movie','episode','tapphim',
            'movie_related', 'meta_title', 'meta_description'
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
            return view('pages/locphim', compact('movie'));
        }
    }
}
