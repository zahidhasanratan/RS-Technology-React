<?php

namespace App\Http\Controllers\admin;

use App\video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video =   video::all();
        return view('admin.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'short' => 'required', // Ensure this is required if you need the video URL
        ]);

        $slug = Str::slug($request->title);

        // Extract the video ID from YouTube URL
        $videoId = null;
        $url = $request->short;

        if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
            $parsedUrl = parse_url($url);

            if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
                // Handle shortened youtu.be links
                $videoId = ltrim($parsedUrl['path'], '/');
            } elseif (isset($parsedUrl['query'])) {
                // Handle regular YouTube links
                parse_str($parsedUrl['query'], $queryParams);
                $videoId = $queryParams['v'] ?? null;
            }
        }

        if (!$videoId) {
            return redirect()->back()->with('errorMsg', 'Invalid YouTube URL format.');
        }

        $video = new Video();
        $video->title = $request->title;
        $video->short = $videoId; // store only the ID

        $video->save();

        return redirect()->route('video.index')->with('successMsg', 'Video Successfully Saved');
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
        $video =   video::find($id);
        return view('admin/video/edit',compact('video'));
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
        $this->validate($request, [
            'title' => 'required',
            'short' => 'required', // Ensure the short field is validated
        ]);

        $slug = Str::slug($request->title);
        $video = Video::find($id);

        // Extract YouTube video ID from URL
        $videoId = null;
        $url = $request->short;

        if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
            $parsedUrl = parse_url($url);

            if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
                // Handle youtu.be format
                $videoId = ltrim($parsedUrl['path'], '/');
            } elseif (isset($parsedUrl['query'])) {
                // Handle youtube.com format
                parse_str($parsedUrl['query'], $queryParams);
                $videoId = $queryParams['v'] ?? null;
            }
        }

        if (!$videoId) {
            return redirect()->back()->with('errorMsg', 'Invalid YouTube URL format.');
        }

        $video->title = $request->title;
        $video->short = $videoId; // Store only the video ID

        $video->save();

        return redirect()->route('video.index')->with('successMsg', 'Video Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = video::find($id);

        $video->delete();
        return redirect()->back()->with('successMsg','Video Successfully Deleted');
    }
}
