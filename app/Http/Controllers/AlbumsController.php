<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Albums;

class AlbumsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $albums = Albums::all();

        return response()->json( $albums );

    }

    /**
     * Get the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     */
    public function show( $id )
    {

        $album = Albums::where( 'id', $id )->get();

        if ( !empty( $album ) )
        {

            return response()->json( $album );

        }
        else {

            return response()->json( [ 'status' => 'fail' ] );

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {

        $this->validate( $request, [

            'name' => 'required',

            'description' => 'required',

            'style' => 'required',

            'published_on' => 'required'
        ] );

        $album = new Albums();

        $album->name = $request->name;

        $album->description = $request->description;

        $album->category = $request->category;

        $date = new \DateTime($request->published_on);

        $dd = $date->format('Y-m-d');

        $album->published_on = $dd;

        $album->save();

        return response()->json(['status' => 'success']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {

        if( Albums::destroy( $id ) )
        {

            return response()->json( ['status' => 'success' ] );

        }

    }

}

