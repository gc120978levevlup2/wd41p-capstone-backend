<?php

namespace App\Http\Controllers;

use App\Models\ParticipantPicture;
use Illuminate\Http\Request;

class ParticipantPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participant_pictures = ParticipantPicture::all();
        return [
            "status" => 1,
            "data" => $participant_pictures
        ];
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
        $file = $request->picturefile;
        $image_parts = explode(",",$file);
        $image_base64 = base64_decode($image_parts[1]);
        //$fn = explode('https://www.garrymcacho.com/',$request->img);
        //$fn = explode('http://localhost/',$request->img);
        $fn = explode('img/',$request->img);
        //$file->move(public_path('/images'), $fn);
        if (!is_dir('img/')) {
            // dir doesn't exist, make it
            mkdir('img/');
        }
        file_put_contents('img/' . $fn[1], $image_base64);
        unset($request->picturefile); // delete picture file attribute
        $participant_picture = ParticipantPicture::create($request->all());
        return [
            "status" => 1,
            //"data" => $request,
            "data" => $participant_picture,
            "msg" => "Participant picture added successfully"
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParticipantPicture  $participantPicture
     * @return \Illuminate\Http\Response
     */
    public function show(ParticipantPicture $participantPicture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParticipantPicture  $participantPicture
     * @return \Illuminate\Http\Response
     */
    public function edit(ParticipantPicture $participantPicture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParticipantPicture  $participantPicture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParticipantPicture $participantPicture)
    {
        $participantPicture::update($request->all());
        return [
            "status" => 1,
            "data" => $participantPicture,
            "msg" => "Participant picture updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParticipantPicture  $participantPicture
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParticipantPicture $participantPicture)
    {
        $participantPicture::delete();
        return [
            "status" => 1,
            "data" => $participantPicture,
            "msg" => "Participant picture deleted successfully"
        ];
    }
}
