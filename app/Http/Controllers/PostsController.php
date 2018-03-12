<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use App\Post;
use App\Category;
use App\Gallery;
use App\Tag;
use App\User;
use App\Status;
use App\Type;
use Auth;
use Image;
use Mail;
//campo url
use Illuminate\Support\Str as Str;

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

    public function index(Request $request)
    {
        //
        if ($request->has('title')) {
            $column = "title";
            $news = Post::filterByRequest($column, $request->get('title'))->paginate(15);
        } else if ($request->has('category')) {
            $column = "category";
            $news = Post::filterByRequest($column, $request->get('category'))->paginate(15);
        } else if ($request->has('status')) {
            $column = "status";
            $news = Post::filterByRequest($column, $request->get('status'))->paginate(15);
        } else {
            $news = Post::orderBy('id', 'desc')->paginate(15);
        }

        return view('posts.index', ['news' => $news, 
                                    'categories' => Category::all(['id', 'name']),
                                    'statuses' => Status::all(['id', 'name']),
                                    'types' => Type::all(['id', 'name']) ]);
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
                                     'tags' => Tag::all(['id', 'name']),
                                     'types' => Type::all(['id', 'name'])]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            'unique'    => ':attribute ya ha sido registrada.',
            'required' => ':attribute es obligatorio',
            'max' => ':attribute no puede ser mayor que :max caracteres',
        );
        // validacion segun Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:199',
            'subtitle' => 'required|max:200',
            'url' => 'required|max:199|unique:posts',
            'content' => 'required',
            'cover_page' => 'mimes:jpeg,jpg,png',
            
        ],  $messages);

        if ($validator->fails()) {
            return redirect('posts/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $news = new Post($request->all());
        $news->status = 2;
        $news->user_id = Auth::id();
        $news->url = Str::slug($request->url ? $request->url : $request->title, '_');
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
                            $tag->url = Str::slug($request->name, '-');
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
            
            $link = url('/').'/'.$news->category->url.'/detalle/'.$news->url;
            //$this->sendMails($news, $link);
            $idLast =   $news->id;; 
            flash('Publicación creada correctamente!')->success();
            return redirect()->route('posts.edit', $idLast);

        }else {
            flash('no se pudo crear la Publicación')->error();
            return view('posts.create');
        }
        
    }

    public function sendMails($infoNew, $link)
    {   

        
        $users = User::allPublicUser()->get();

        foreach ($users as $key => $user) {
            $emails[] = $user->email;
        }

        Mail::send('emails.contact-news', ['info' => $infoNew, 'link' => $link], function($message) use ($emails)
        {    
            $message->to($emails)->subject('Nueva publicación disponible - Corporación del Deporte Cerro Navia');    
        });
        
        return redirect()->route('posts.edit', $infoNew->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('url','=', $slug)->firstOrFail();

        return view('site/post_detail', ['post' => $post]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $tab = null)
    {                           
        //esto es para actvivar el tab en info
        if ($tab) {
           $tabName = array(
                'name' => 'gallery',
            );
        } else {
            $tabName = array(
                'name' => 'info',
            );
        }
        

        return view('posts.edit', [ 'news' => Post::findOrFail($id), 
                                    'tab' => $tabName, 
                                    'categories' => Category::all(['id', 'name']),
                                    'gallery' => Gallery::where('post_id', '=', $id)->paginate(30),
                                    'tags' => Tag::all(['id', 'name']),
                                    'tagsInPost' => Post::findOrFail($id)->tags()->get()->toArray(),
                                    'statuses' => Status::all(['id', 'name']),
                                    'types' => Type::all(['id', 'name']) ]);
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
        if (!$request->show) {
            $messages = array(
                'unique'    => ':attribute ya ha sido registrada.',
                'required' => ':attribute es obligatorio',
                'max' => ':attribute no puede ser mayor que :max caracteres',
                'email'    => ':attribute .',
                'min'      => ':attribute moet minimaal :min karakters bevatten.',
            );
            // validacion segun Validator
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:199',
                'subtitle' => 'required|max:200',
                'content' => 'required',
                'cover_page' => 'mimes:jpeg,jpg,png',
                
            ],  $messages);

            if ($validator->fails()) {
                return redirect('posts/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput();
            }
        }
            
            $news = Post::find($id); 
            
            if ($news) {

                //si la url es distinta valido que no se repita en bd
                if ($request->url) {
                   
                    if ($news->url != $request->url) {
                        $messages = array(
                            'url.unique'    => 'La url ya ha sido registrada.',
                            'required' => 'El campo es obligatorio',
                        );
                        $validRequest = $request->all();
                        $validRequest['url'] = Str::slug($validRequest['url'], '_');
                        $validator = Validator::make($validRequest, [
                            'url' => 'required|string|max:255|unique:posts',
                        ],  $messages);

                        if ($validator->fails()) {
                            return redirect('posts/'.$id.'/edit')
                                        ->withErrors($validator)
                                        ->withInput();
                        }
                    }
                }
                $news->title = $request->title ? $request->title : $news->title;
                $news->subtitle = $request->subtitle ? $request->subtitle : $news->subtitle;
                $news->url = $request->url ? Str::slug($request->url, '_') : $news->url;
                $news->category_id = $request->category_id ? $request->category_id : $news->category_id;
                $news->content = $request->content ? $request->content : $news->content;
                //si no viene el status a 0
                $news->status = $request->status ? $request->status : $news->status;

                $news->type = $request->type ? $request->type : $news->type;

                //viene una imagen nueva
                if ($request->cover_page && $request->cover_page != '') {

                    if ($news->cover_page && $news->cover_page != '') {
                        $nombre_fichero = public_path() .  '/uploads/news/' . $news->cover_page;
                        if (file_exists($nombre_fichero)) {
                            unlink(public_path() .  '/uploads/news/' . $news->cover_page );
                        }
                    }
                    $avatar = $request->file('cover_page');
                    $random_string = md5(microtime());
                    $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
                    Image::make($avatar)->save( public_path('/uploads/news/' . $filename ) );
                    $news->cover_page = $filename;
                
                } else {
                    $news->cover_page = $news->cover_page; 
                }
                

                if ($news->save()) {

                    //si vienen los tags
                    if ($request->tags) {
                        $news->tags()->detach();
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
                                    $tag->url = Str::slug($value, '-');
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

                    if ($request->show) {
                        flash('La noticia '. $news->title .' se actualizó correctamente!')->success();
                        return redirect()->route('posts.index');
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
