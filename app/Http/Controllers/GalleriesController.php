<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Gallery;
use App\Category;
use Auth;
use Image;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = Gallery::paginate(15);
        return view('galleries.index', ['galleries' => $galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('galleries.create', ['news' => Post::all(['id', 'title'])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $files = $request->filesToUpload;

        if($files){

            foreach ($files as $file) {

                $gallery = new gallery();
                $gallery->name = $request->name;
                $gallery->status = 1;
                $gallery->post_id = $request->post_id;
                $avatar = $file;
                $random_string = md5(microtime());
                $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
                $upload_success = Image::make($avatar)->save( public_path('/uploads/gallery/' . $filename ) );        
                $gallery->url = $filename;
                $gallery->save();


            }   
            if ($upload_success && $gallery->save()) {
                flash('imagen(es) subidas correctamente!')->success();
                //from viene de editar noticia si es asi lo redirecciono donde mismo
                if ($request->from) {
                    //esto es para actvivar el tab en galeria
                    return redirect()->route('posts.edit', $gallery->post_id);

                } else{
                    
                    return redirect()->route('galleries.create');
                }
               
            }
            else {
                flash('no se pudieron subir las imagenes')->error();
                return redirect()->route('galleries.create');
            }
        }

      
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //

        $gallery = Gallery::find($id);


        if ($gallery->delete()) {
            //$file_path = app_path().'/images/news/'.$news->photo;

            //unlink('/uploads/news/gallery'.$gallery->url);
            unlink(public_path() .  '/uploads/gallery/' . $gallery->url );
            flash('imagen eliminada correctamente!')->success();
            if ($request->from) {
                //esto es para actvivar el tab en galeria
                $tabName = array(
                    'name' => 'gallery',
                );
                return redirect()->route('posts.edit', $gallery->post_id);
                
            } else{
                return redirect('gallery');
            }
        } else{
            flash('no se pudieron subir la imagen')->error();
            return redirect('gallery');
        }

        

        

    }
}
