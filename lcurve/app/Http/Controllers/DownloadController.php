<?php

namespace App\Http\Controllers;

use App\Download;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $downloads = Download::all();
      return view('downloads.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'title'=>'required|min:10',
        'file'=>'required',
        'description'=>'required|min:10',
      ]);

      $file = $request->file('file');

      $download=Download::create([
        'title'=>$request['title'],
        'fileurl'=>Storage::putFile('downloads', $file),
        'filename'=>$file->getFileName(),
        'mime'=>$file->getClientMimeType(),
        'original_filename' => $file->getClientOriginalName(),
        'description' => $request['description'],
      ]);

      return redirect()->route('downloads.index')->with('flash_message','File, '.$download->original_filename.' uploaded' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show($filename)
    {
      $download = Download::where('filename', '=', $filename)->firstOrFail();

      return response()->download(storage_path('app/'.$download->fileurl));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $download = Download::findOrFail($id);

      return view('downloads.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $download = Download::findOrFail($id);

      $this->validate($request,[
        'title'=>'required|min:10',
        'file'=>'required',
        'description'=>'required|min:10',
      ]);

      $file = $request->file('file');

      $input = [
        'title'=>$request['title'],
        'fileurl'=>Storage::putFile('downloads', $file),
        'filename'=>$file->getFileName(),
        'mime'=>$file->getClientMimeType(),
        'original_filename' => $file->getClientOriginalName(),
        'description' => $request['description'],
      ];

      $download->fill($input)->save();

      return redirect()->route('downloads.index')->with('flash_message','File successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $download=Download::findorFail($id);

      $download->delete();

      return redirect()->route('downloads.index')->with('flash_message','File deleted');
    }
}
