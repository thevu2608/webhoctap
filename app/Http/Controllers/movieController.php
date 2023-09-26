<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Converter\Number\GenericNumberConverter;
class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category', 'movie_genre', 'country')->orderBy('id', 'DESC')->get();
        $path = public_path()."/json_file/";
        if (!is_dir($path)){
            mkdir($path, 0777, true);
        }
        File::put($path.'movies.json', json_encode($list));

        return view('admincp.movie.index', compact('list'));
    }
    public function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }
    public function update_season(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }
    public function update_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }
    public function filter_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', 0)->orderBy('date_update', 'DESC')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if ($mov->resolution == 0) {
                $text = 'HD';
            } elseif ($mov->resolution == 1) {
                $text = 'SD';
            } elseif ($mov->resolution == 2) {
                $text = 'HDR';
            } elseif ($mov->resolution == 3) {
                $text = 'FullHD';
            } else {
                $text = 'Trailer';
            }
            $output .= ' <div class="item post-37176 ">
                <a href="' . url('phim/' . $mov->slug) . '" title="' . $mov->title . '">
            <div class="item-link">
                <img src="' . url('uploads/movie/' . $mov->image) . '" class="lazy post-thumb" alt="' . $mov->title . '" />
                <span class="is_trailer">' . $text . '</span>
            </div>
                <p class="title">' . $mov->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                <span style="width: 0%"></span>
            </span>
        </div>';
        }
        echo $output;
    }
    public function topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderBy('date_update', 'DESC')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if ($mov->resolution == 0) {
                $text = 'HD';
            } elseif ($mov->resolution == 1) {
                $text = 'SD';
            } elseif ($mov->resolution == 2) {
                $text = 'HDR';
            } elseif ($mov->resolution == 3) {
                $text = 'FullHD';
            } else {
                $text = 'Trailer';
            }
            $output .= ' <div class="item post-37176 ">
                <a href="' . url('phim/' . $mov->slug) . '" title="' . $mov->title . '">
            <div class="item-link">
                <img src="' . url('uploads/movie/' . $mov->image) . '" class="lazy post-thumb" alt="' . $mov->title . '" />
                <span class="is_trailer">' . $text . '</span>
            </div>
                <p class="title">' . $mov->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                <span style="width: 0%"></span>
            </span>
        </div>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        $country = Country::pluck('title', 'id');
        return view('admincp.movie.form', compact('category', 'genre', 'country', 'list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->tags = $data['tags'];
        $movie->time_movie = $data['time_movie'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->resolution = $data['resolution'];
        $movie->vietsub = $data['vietsub'];
        $movie->slug = $data['slug'];
        $movie->name_eng = $data['name_eng'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->date_created = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->date_update = Carbon::now('Asia/Ho_Chi_Minh');
        foreach ($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }
        // Thêm hình ảnh
        $get_image = $request->file('image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();

            // Di chuyển và lưu hình ảnh vào thư mục tương ứng
            $get_image->move('uploads/movie/', $new_image);

            // Gán giá trị cho cột 'image'
            $movie->image = $new_image;
        }
        $movie->save();

        $movie -> movie_genre()->sync($data['genre']);
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title', 'id');
        $list_genre = Genre::all();
        $genre = Genre::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $movie = Movie::find($id);
        $movie_genre = $movie->movie_genre;
        return view('admincp.movie.form', compact('category', 'genre', 'country', 'movie', 'list_genre', 'movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->tags = $data['tags'];
        $movie->time_movie = $data['time_movie'];
        $movie->sotap = $data['sotap'];
        $movie->trailer = $data['trailer'];
        $movie->resolution = $data['resolution'];
        $movie->vietsub = $data['vietsub'];
        $movie->slug = $data['slug'];
        $movie->name_eng = $data['name_eng'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->date_update = Carbon::now('Asia/Ho_Chi_Minh');
        foreach ($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }
        // Thêm hình ảnh
        $get_image = $request->file('image');

        if ($get_image) {
            if (!empty($movie->image)) {
                unlink('uploads/movie/' . $movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();

            // Di chuyển và lưu hình ảnh vào thư mục tương ứng
            $get_image->move('uploads/movie/', $new_image);

            // Gán giá trị cho cột 'image'
            $movie->image = $new_image;
        }
        $movie->save();
        $movie -> movie_genre()->sync($data['genre']);
        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if (!empty($movie->image) && file_exists(public_path() . '/uploads/movie/' . $movie->image)) {
            unlink(public_path() . '/uploads/movie/' . $movie->image);
        }
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();
        $movie->delete();
        return redirect()->back();
    }
}
