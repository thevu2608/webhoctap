<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Info;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function timkiem()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];

            $movie = Movie::withCount('episode')->where('title', 'LIKE', '%' . $search . '%')->orderBy('date_update', 'DESC')->paginate(40);
            $movie_seo = Movie::with('genre', 'category', 'country', 'movie_genre')->where('status', 1)->first();
            $meta_title = $movie_seo->title;
            $meta_description = $movie_seo->description;
            return view('pages/timkiem', compact('search', 'movie', 'meta_title', 'meta_description'));
        } else {
            return redirect()->to('/');
        }
    }
    public function home()
    {
        $info = Info::find(1);
        $meta_title = $info->title;
        $meta_description = $info->description;

        $category_home = Category::with(['movie' => function ($q) {
            $q->withCount('episode')->where('status', 1);
        }])->orderBy('id', 'DESC')->where('status', 1)->get();

        return view('pages/home', compact('category_home', 'meta_title', 'meta_description'));
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
        return view('pages/genre', compact('genre_slug', 'movie', 'movie_genre', 'meta_title', 'meta_description'));
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

        return view('pages/movie', compact(
            'movie',
            'movie_related',
            'episode',
            'episode_first',
            'episode_count',
            'meta_title',
            'meta_description'
        ));
    }
    public function watch($slug, $tap)
    {
        $movie = Movie::with('genre', 'category', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        $meta_title = 'Xem phim: ' . $movie->title;
        $meta_description = $movie->description;
        $movie_related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)
            ->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        return view('pages/watch', compact(
            'movie',
            'episode',
            'movie_related',
            'meta_title',
            'meta_description'
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
            $movie_seo = Movie::with('genre', 'category', 'country', 'movie_genre')->where('status', 1)->first();
            $meta_title = $movie_seo->title;
            $meta_description = $movie_seo->description;
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
            return view('pages/locphim', compact('movie', 'meta_title', 'meta_description'));
        }
    }
}
