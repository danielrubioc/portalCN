<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Gallery;
use App\Tag;
use App\User;
use App\Workshop;
use App\Student;
use App\Teacher;
use Mail;
use Auth;
use Image;


class HomeController extends Controller
{
    //iran todo las views del sitio publico
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // vista para los admins
    public function index()
    {
        return view('dashboard_admin');
    }

    // vista para los profes
    public function indexTeacher()
    {   
        $workshops = Workshop::getListActiveWorkshops()->paginate(15); 
        return view('dashboard_teacher', ['workshops' => $workshops]);
    }

    // vista para los alumnos
    public function indexPublic()
    {   
        //lista de talleres activos
        $workshops = Workshop::getListActiveWorkshops()->paginate(15); 
        return view('dashboard_public', ['workshops' => $workshops]);
    }
    
    public function indexSite()
    {   
        return view('site/home');
    }


    public function about()
    {
        return view('site/about');
    }

    public function contact()
    {
        return view('site/contact');
    }

    
 
    public function sendContact(Request $request)
    {
        //

        Mail::send('emails.contact', $request->all(), function($msj){
            $msj->subject('Corrreo de contacto');
            $msj->to('daniel.janorc@gmail.com');
        });

        flash('Contacto enviado correctamente!')->success();
        return view('site/contact');
                
    }

    public function showPostDetail($slug)
    {
        $post = Post::where('url','=', $slug)->firstOrFail();

        return view('site/post_detail', ['post' => $post]);
        
    }

    public function indexPosts(Request $request, $id = null, $name = null)
    {
         //
        if ($request->has('title')) {
            $column = "title";
            $posts = Post::filterByRequest($column, $request->get('title'))->paginate();
        } else if ($request->has('category')) {
            $column = "category";
            $posts = Post::filterByRequest($column, $request->get('category'))->paginate();
        } else if ($request->has('status')) {
            $column = "status";
            $posts = Post::filterByRequest($column, $request->get('status'))->paginate();
        } else if ($id) {
            $column = "category";
            $posts = Post::filterByRequest($column, $id)->paginate();
        } else {
            $posts = Post::getListActivePost()->paginate(15);
        }

        return view('site.post_categories', ['posts' => $posts, 'categories' => Category::getListActiveCategories()->get(), 'tags' => Tag::getListActiveTags()->get() ]);
    }

    
}
