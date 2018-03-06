<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
//campo url
use Illuminate\Support\Str as Str;

class TagsController extends Controller
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
        $tags = Tag::latest()->paginate(5);
        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tags.create');
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
        $tags = new Tag($request->all());
        $tags->status = 1;
        $tags->url = Str::slug($request->name, '-');
        if ($tags->save()) {
            flash('Categoría creada correctamente!')->success();
            return redirect('tags');
        }else {
            flash('no se pudo crear la categoría')->error();
            return view('tags.create');
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
        return view('tags.edit', ['tag' => Tag::findOrFail($id)]);
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
        $tag = Tag::find($id); 
            if ($tag) {
                $tag->name = $request->name ?  $request->name : $tag->name;
                $tag->status = $request->status ? $request->status : $request->status;
                $tag->url = $request->name ?  Str::slug($request->name, '-') : $tag->url;

                if ($tag->save()) {
                    flash('El tag '. $tag->name .' se actualizó correctamente!')->success();
                    if ($request->show) {
                        return redirect()->route('tags.index');
                    }
                    return redirect()->route('tags.edit', $tag->id);
                } else {
                    flash('El tag no se pudo actualizar.')->error();
                    return redirect()->route('tags.edit', $tag->id);
                }
                
            }  else{
                
                flash('no se encuentra el tag')->error();
                return redirect()->route('tags.edit', $id);
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
        $tag = Tag::find($id);
        if ($tag->delete()) {
            flash('Tag eliminado correctamente!')->success();
            return redirect('tags');
        } else{
            flash('No se pudo eliminar el tag!')->error();   
            return redirect('tags');
        }
    }
}
