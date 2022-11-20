<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Str;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Photo.photo");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lecture' => 'mimes:pdf,xlx,csv|max:2048',
            'personal_picture' => 'mimes:png,jpg,jpeg|max:2048',
        ]/*,['mimes'=>'adasdasd']*/);
        //dd($request->personal_picture,$request->lecture);
        $fileNameLecture = 'lecture-'.Str::random().'.'.$request->lecture->extension();
        $fileNamePhoto = 'picture-'.Str::random().'.'.$request->personal_picture->extension();
        if($request->lecture->move(public_path('downloaded-lectures'), $fileNameLecture) 
        && $request->personal_picture->move(public_path('downloaded-photos'), $fileNamePhoto) ){//move the file to public folder in this project
                Photo::create([
                    'lecture' =>  $fileNameLecture,
                    'personal_picture' => $fileNamePhoto,
                 ]);
        }








        // if($request->passport_picture){
        //     $passport_picture_name = 'passport_picture-'.Str::random().'.'.$this->get_type($request->passport_picture);//choose name of file via Str::random() function to be identical each time i want to create a new file
        //     $dir='images/passport-pictures/';
        //     $relativePath = $dir.$passport_picture_name;
        //     $absolutePath = public_path($dir);
        //     if(!  file_exists($absolutePath))
        //         File::makeDirectory($absolutePath,8755,true);
        //     file_put_contents($relativePath, $request->passport_picture);
        //     $request->passport_picture->move($absolutePath, $passport_picture_name);
        //     $request["passport_picture"]=$relativePath;
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
