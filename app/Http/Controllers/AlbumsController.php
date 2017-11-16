<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Albums;

class AlbumsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index() {

        $albums = Albums::all();

        return response()->json( $albums );

    }


}

