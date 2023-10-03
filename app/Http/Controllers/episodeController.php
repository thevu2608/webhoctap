<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class episodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_episode = Episode::with('movie')->orderBy('movie_id', 'DESC')->get();
        return view('admincp.episode.index', compact('list_episode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id', 'sotap');
        return view('admincp.episode.form', compact('list_movie'));
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
        $check = Episode::where('episode', $data['episode'])->where('movie_id', $data['movie_id'])->count();
            if($check>0){
                return redirect()->back();
            }else{
            $episode = new Episode();
            $episode->movie_id = $data['movie_id'];
            $episode->linkphim = $data['link'];
            $episode->episode = $data['episode'];
            $episode->create_time = Carbon::now('Asia/Ho_Chi_Minh');
            $episode->update_time = Carbon::now('Asia/Ho_Chi_Minh');
            $episode->save();
        }
        return redirect()->route('episode.index');
    }
    public function add_episode($id){
        $movie = Movie::find($id);
        $list_episode = Episode::with('movie')->where('movie_id', $id)->orderBy('episode', 'DESC')->get();
        return view('admincp.episode.add_episode', compact('list_episode', 'movie'));
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
        $episode = Episode::find($id);
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id', 'sotap');
        return view('admincp.episode.form', compact('episode', 'list_movie'));
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
        $episode = Episode::find($id);
        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['link'];
        $episode->episode = $data['episode'];
        $episode->create_time = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->update_time = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        return redirect()->route('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Episode::find($id)->delete();
        return redirect()->back();
    }
    public function select_movie(){
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output = '<option>---Chọn Tập Phim---</option>';
        if($movie->thuocphim =='phim bo'){
            for ($i = 1; $i<=$movie->sotap; $i++){
                $output .= '<option value="'.$i.'">'.$i.'</option>';
            }
        }
        else{
            $output .= '<option value="HD">HD</option>
            <option value="Full HD"> Full HD</option>
            <option value="HDR"> HDR </option>
            <option value="SD"> SD </option> ';
        }
        echo $output;
    }
}
