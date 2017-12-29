<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Gallery;
use App\Tag;
use Auth;
use Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $news = Post::paginate(15);
        return view('posts.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create', ['categories' => Category::all(['id', 'name']),
                                     'tags' => Tag::all(['id', 'name'])]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $news = new Post($request->all());
        $news->status = 1;
        $news->user_id = Auth::id();
        
        if( $request->hasFile('cover_page') ) {
            $avatar = $request->file('cover_page');
            $random_string = md5(microtime());
            $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/news/' . $filename ) );
            $news->cover_page = $filename;
        }   
        
        if ($news->save()) {
            //si vienen los tags
            if ($request->tags) {
                foreach ($request->tags as $key => $value) {
                    // si viene un string esto pasa cuando es un nuevo tag 
                    if(is_numeric($value) == false) {
                        //busco por nombre los tags que vienen
                        $tag = Tag::firstOrNew(['name' => $value]);
                        //si no existe lo creo
                        if (!$tag->exists) {    
                            $tag = new Tag();
                            $tag->status = 1;
                            $tag->name = $value;
                            $tag->save();
                            // agrego el id al arreglo $tags
                            $tags[$key] = $tag->id;
                        } 
                    } else {
                      $tags[$key] = $value;  
                    }

                }
                $news->tags()->attach($tags);
            }
            $lastInsertedId = $news->id;
            flash('Noticia creada correctamente!')->success();
            $tabName = array(
                'name' => 'info',
            );

            return view('posts.edit', ['news' => Post::findOrFail($lastInsertedId), 
                                    'tab' => $tabName, 
                                    'categories' => Category::all(['id', 'name']),
                                    'gallery' => Gallery::where('post_id', '=', $lastInsertedId),
                                    'tags' => Tag::all(['id', 'name']),
                                    'tagsInPost' => Post::findOrFail($lastInsertedId)->tags()->get()->toArray() ]);

        }else {
            flash('no se pudo crear la categoría')->error();
            return view('posts.create');
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
        //esto es para actvivar el tab en info
        $tabName = array(
            'name' => 'info',
        );

        return view('posts.edit', [ 'news' => Post::findOrFail($id), 
                                    'tab' => $tabName, 
                                    'categories' => Category::all(['id', 'name']),
                                    'gallery' => Gallery::where('post_id', '=', $id)->paginate(30),
                                    'tags' => Tag::all(['id', 'name']),
                                    'tagsInPost' => Post::findOrFail($id)->tags()->get()->toArray() ]);
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
        //$user->roles()->detach($roleId);

            $news = Post::find($id); 
            if ($news) {
                $news->title = $request->title;
                $news->subtitle = $request->subtitle;
                if ($request->cover_page) {
                    unlink(public_path() .  '/uploads/news/' . $news->cover_page );
                    $avatar = $request->file('cover_page');
                    $random_string = md5(microtime());
                    $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
                    Image::make($avatar)->save( public_path('/uploads/news/' . $filename ) );
                    $news->cover_page = $filename;
                
                } else {
                    $news->cover_page = $news->cover_page; 
                }
                //$user->status = $request->status;
                $news->content = $request->content;
                $news->status = $request->status ? $request->status : 1;
                if ($news->save()) {

                    //si vienen los tags
                    if ($request->tags) {
                        foreach ($request->tags as $key => $value) {
                            // si viene un string esto pasa cuando es un nuevo tag 
                            if(is_numeric($value) == false) {
                                //busco por nombre los tags que vienen
                                $tag = Tag::firstOrNew(['name' => $value]);
                                //si no existe lo creo
                                if (!$tag->exists) {    
                                    $tag = new Tag();
                                    $tag->status = 1;
                                    $tag->name = $value;
                                    $tag->save();
                                    // agrego el id al arreglo $tags
                                    $tags[$key] = $tag->id;
                                } 
                            } else {
                              $tags[$key] = $value;  
                            }

                        }
                        $news->tags()->detach();
                        $news->tags()->attach($tags);
                    }
                    

                    flash('La noticia '. $news->title .' se actualizó correctamente!')->success();
                    
                    return redirect()->route('posts.edit', $news->id);
                } else {
                    flash('La noticia no se pudo actualizar.')->error();
                    return redirect()->route('posts.edit', $news->id);
                }
                
            }  else{
                
                flash('no se encuentra la noticia')->error();
                return redirect()->route('posts.edit', $id);
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Post::find($id);
        if ($category->delete()) {
            if ($category->cover_page) {
                unlink(public_path() .  '/uploads/news/' . $category->cover_page );
            }
            flash('Noticia eliminada correctamente!')->success();
            return redirect('posts');
        } else{
            flash('No se pudo eliminar la Noticia!')->error();   
            return redirect('posts');
        }
    }



     public function destroyGallery($id, Request $request)
    {

        $gallery = Gallery::find($id);

        if ($gallery->delete()) {

            unlink(public_path() .  '/uploads/gallery/' . $gallery->url );
            flash('imagen eliminada correctamente!')->success();
            $tabName = array(
                'name' => 'gallery',
            );
            return redirect()->route('posts.edit', $gallery->post_id);

        } else{
            return redirect()->route('posts.edit', $gallery->post_id);
        }

    }

}
