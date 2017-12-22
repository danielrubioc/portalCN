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
        //
        //var_dump($request);
       
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


            $lastInsertedId = $news->id;
            $news->tags()->attach($request->tags);
            flash('Noticia creada correctamente!')->success();
            $tabName = array(
                'name' => 'info',
            );
            return view('posts.edit', ['news' => Post::findOrFail($lastInsertedId), 
                                    'tab' => $tabName, 
                                    'categories' => Category::all(['id', 'name']),
                                    'gallery' => Gallery::where('post_id', '=', $lastInsertedId) ]);

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

        return view('posts.edit', ['news' => Post::findOrFail($id), 
                                    'tab' => $tabName, 
                                    'categories' => Category::all(['id', 'name']),
                                    'gallery' => Gallery::where('post_id', '=', $id) ]);
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

            if ($request->show) {
                $news = Post::findOrFail($id);
                $news->title = $news->title;
                $news->subtitle = $news->subtitle;
                $news->cover_page = $news->cover_page;
                $news->status = $request->status;
                $news->save();
                $news = Post::paginate(15);
                return view('posts.index', ['news' => $news]);
            } else {

                $news = Post::find($id); 
                if ($news) {
                    $news->title = $request->title;
                    $news->subtitle = $request->subtitle;
                    if ($request->cover_page) {
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
            flash('Noticia eliminada correctamente!')->success();
            return redirect('post');
        } else{
            flash('No se pudo eliminar la Noticia!')->error();   
            return redirect('post');
        }
    }
}