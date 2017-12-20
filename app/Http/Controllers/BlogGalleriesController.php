<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\BlogNew;
use App\BlogGallery;
use App\BlogCategory;
use Auth;
use Image;

class BlogGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = BlogGallery::paginate(15);
        return view('blogGallery.index', ['galleries' => $galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogGallery.create', ['news' => BlogNew::all(['id', 'title'])]);
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

                $gallery = new BlogGallery();
                $gallery->name = $request->name;
                $gallery->status = 1;
                $gallery->blog_news_id = $request->blog_news_id;
                $avatar = $file;
                $random_string = md5(microtime());
                $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
                $upload_success = Image::make($avatar)->save( public_path('/uploads/gallery/' . $filename ) );
                
                $gallery->url = $filename;
                $gallery->save();

                 /*if (!$upload_success && !) {
                    flash('no se pudieron subir las imagenes')->error();
                   return redirect()->route('blogGallery.create');         
                }*/

            }   

            if ($upload_success && $gallery->save()) {
                flash('imagen(es) subidas correctamente!')->success();
                //from viene de editar noticia si es asi lo redirecciono donde mismo
                if ($request->from) {
                    //esto es para actvivar el tab en galeria
                    $tabName = array(
                        'name' => 'gallery',
                    );

                    return view('blogNew.edit', ['news' => BlogNew::findOrFail($request->blog_news_id), 
                            'tab' => $tabName, 
                            'categories' => BlogCategory::all(['id', 'name']),
                            'gallery' => BlogGallery::where('blog_news_id', '=', $request->blog_news_id)->paginate(10) ]);
                } else{
                    
                    return redirect()->route('blogGallery.create');
                }
               
            }
            else {
                flash('no se pudieron subir las imagenes')->error();
                return redirect()->route('blogGallery.create');
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

        $gallery = BlogGallery::find($id);


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
                return view('blogNew.edit', ['news' => BlogNew::findOrFail($gallery->blog_news_id), 
                                            'tab' => $tabName, 
                                            'categories' => BlogCategory::all(['id', 'name']),
                                            'gallery' => BlogGallery::where('blog_news_id', '=', $gallery->blog_news_id)->paginate(10) ]);
            } else{
                return redirect('blogGallery');
            }
        } else{
            flash('no se pudieron subir la imagen')->error();
            return redirect('blogGallery');
        }

        

        

    }
}
