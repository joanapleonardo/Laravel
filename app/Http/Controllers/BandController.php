<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Storage;



class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('bands.home');
    }


    public function all_bands()
    {
        $allBands=DB::table('bands')
        ->get();

        foreach($allBands as $band){
            $band->num = $this->albumCount($band->id);
        }
      
        return view('bands.view_bands', compact('allBands'));
    }


    public function albumCount($id)
    {
        $albumCount= DB::table('albums')
        ->where('band_id', $id)
        ->select('albuns.*')
        ->count();

        return $albumCount;
    }


    public function all_albums()
    {
        $allAlbums=$this->getAllAlbums();

        return view('albums.all_albums', compact('allAlbums'));
    }


    public function add_albums()
    {
        $allAlbums=$this->getAllAlbums();
        $allBands=DB::table('bands')
        ->get();

        return view('albums.new_album', compact('allAlbums', 'allBands'));
    }


     public function getAllAlbums()
    {
        $allAlbums= DB::table('albums')
        ->get();

        return $allAlbums;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAlbum(Request $request){

        $myAlbum = $request->all();
    
        $request->validate(['name' => 'required|string']);

        $photo = null;

        if($request->hasFile('photo')){
            $photo = Storage::putFile('fotos', $request->photo);
           } 
    
        DB::table('albums')->insert(
        [
            'photo' => $photo,
            'name' => $request->name,
            'release_date' => $request->release_date,
            'band_id' => $request->band_id,
        ]);
    
        return redirect('all_albums')->with('message', 'Álbum criado com sucesso');

        }

        public function add_band()
    {
        $allBands=DB::table('bands')
        ->get();
        $allAlbums=$this->getAllAlbums();

        return view('bands.add_bands', compact('allAlbums', 'allBands'));
    }



        public function createBand(Request $request){

            $myBand = $request->all();
        
            $request->validate(['name' => 'required|string']);
    
            $photo = null;
    
            if($request->hasFile('photo')){
                $photo = Storage::putFile('fotos', $request->photo);
               } 
        
            DB::table('bands')->insert(
            [
                'photo' => $photo,
                'name' => $request->name,
            ]);
        
            return redirect('/all_bands')->with('message', 'Banda criada com sucesso');
            }


            public function showBand($id)
            {
                $ourBand = DB::table('bands')
                    ->where('id', $id)
                    ->first();

                $ourAlbum = DB::table('albums')
                ->where('band_id', $id)
                ->get();
            
                return view('bands.show_band', compact('ourBand', 'ourAlbum'));
            }


            public function viewAlbum($id)
            {
                $ourAlbum = DB::table('albums')
                    ->where('id', $id)
                    ->first();
            
                return view('albums.show_album', compact('ourAlbum'));
            }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editarBanda($id)
    {
        $ourBand = DB::table('bands')
        ->where('id', $id)
        ->first();

        return view ('bands.edit_band', compact('ourBand'));
    }


    public function editBand(Request $request)
    {
       $request->validate(['nome' => 'required']);

       $photo = null;

       if($request->hasFile('photo')){
        $photo = Storage::putFile('uploadedFiles', $request->photo);
       }    

       DB::table('bands')
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $request->nome,
                    'photo' => $photo
                ]
            );
        return redirect('all_bands')->with('message', 'Banda editada com sucesso');
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function editAlbum(Request $request)
    {
       $request->validate(['nome' => 'required']);

       $photo = null;

       if($request->hasFile('photo')){
        $photo = Storage::putFile('uploadedFiles', $request->photo);
       }    

       DB::table('albums')
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $request->nome,
                    'photo' => $photo,
                    'release_date' => $release_date
                ]
            );
        return redirect('all_albums')->with('message', 'Album editado com sucesso');
    
    }

    /**
     * Remove the specified resource from storage.
     */
  public function deleteBand($id)
    {
        DB::table('albums')
        ->where('band_id', $id)
        ->delete();


        DB::table('bands')
        ->where('id', $id)
        ->delete();

        if (request()->query('band_id')) {
            $allBands = DB::table('bands')
                ->where('id', request()->query('band_id'))
                ->get();
        } else {
            $allBands = DB::table('bands')
                ->get();
        }
    
        return back();
    }

    public function deleteAlbum($id)
    {
        DB::table('albums')
        ->where('id', $id)
        ->delete();

        return back();
    }
}
