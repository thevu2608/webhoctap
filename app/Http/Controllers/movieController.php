<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Info;
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
        $list = Movie::with('category', 'movie_genre', 'country')->withCount('episode')->orderBy('id', 'DESC')->get();
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $path = public_path() . "/json_file/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        File::put($path . 'movies.json', json_encode($list));

        return view('admincp.movie.index', compact('list', 'category', 'country'));
    }
    public function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->save();
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
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->date_created = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->date_update = Carbon::now('Asia/Ho_Chi_Minh');
        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id = $gen[0];
        }

        $get_image = $request->file('image');
        // Thêm hình ảnh
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();

            // Di chuyển và lưu hình ảnh vào thư mục tương ứng
            $get_image->move('uploads/movie/', $new_image);

            // Gán giá trị cho cột 'image'
            $movie->image = $new_image;
        }
        // Thêm document
        $get_document = $request->file('document');
        $path_document = 'uploads/pdf';
        if ($get_document) {
            $get_name_document = $get_document->getClientOriginalName();
            $name_document = current(explode('.', $get_name_document));
            $new_document = $name_document . rand(0, 9999) . '.' . $get_document->getClientOriginalExtension();
            // Di chuyển và lưu hình ảnh vào thư mục tương ứng
            $get_document->move($path_document, $new_document);
            // Gán giá trị cho cột 'image_sach'
            $movie->file_sach = $new_document;
        }

        $movie->save();
        toastr()->success('Create', 'Thêm chuyên đề thành công!');

        $movie->movie_genre()->sync($data['genre']);
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
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->date_update = Carbon::now('Asia/Ho_Chi_Minh');
        foreach ($data['genre'] as $key => $gen) {
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
        // Thêm document
        $get_document = $request->file('document');
        $path_document = 'uploads/pdf';
        if ($get_document) {
            if (!empty($movie->file_sach)) {
                unlink('uploads/pdf/' . $movie->file_sach);
            }
            $get_name_document = $get_document->getClientOriginalName();
            $name_document = current(explode('.', $get_name_document));
            $new_document = $name_document . rand(0, 9999) . '.' . $get_document->getClientOriginalExtension();
            $get_document->move($path_document, $new_document);
            $movie->file_sach = $new_document;
        }
        $movie->save();
        toastr()->success('Update', 'Sửa chuyên đề thành công!');
        $movie->movie_genre()->sync($data['genre']);
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
        if (!empty($movie->file_sach) && file_exists(public_path() . '/uploads/pdf/' . $movie->file_sach)) {
            unlink(public_path() . '/uploads/pdf/' . $movie->file_sach);
        }

        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();

        Episode::whereIn('movie_id', [$movie->id])->delete();

        $movie->delete();
        toastr()->warning('Delete', 'Xóa chuyên đề thành công!');
        return redirect()->back();
    }

    public function category_choose(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->category_id = $data['category_id'];
        $movie->save();
    }
    public function country_choose(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->country_id = $data['country_id'];
        $movie->save();
    }
    public function trangthai_choose(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->status = $data['trangthai_id'];
        $movie->save();
    }
    public function update_image_movie_ajax(Request $request)
    {
        $get_image = $request->file('file');
        $movie_id = $request->movie_id;

        if ($get_image) {
            $movie = Movie::find($movie_id);
            unlink('uploads/movie/' . $movie->image);
            //Thêm ảnh mới
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();

            // Di chuyển và lưu hình ảnh vào thư mục tương ứng
            $get_image->move('uploads/movie/', $new_image);

            // Gán giá trị cho cột 'image'
            $movie->image = $new_image;
            $movie->save();
        }
    }
}
