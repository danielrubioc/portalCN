<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = BlogCategory::latest()->paginate(5);
        return view('blogCategory.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogCategory.create');
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
        $category = new BlogCategory($request->all());
        $category->status = 1;
        if ($category->save()) {
            flash('Categoría creada correctamente!')->success();
            return redirect('blogCategory');
        }else {
            flash('no se pudo crear la categoría')->error();
            return view('blogCategory.create');
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
        return view('blogCategory.edit', ['category' => BlogCategory::findOrFail($id)]);
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
        $category = BlogCategory::find($id); 
            if ($category) {
                $category->name = $request->name;
                if ($category->save()) {
                    flash('La categoría '. $category->name .' se actualizó correctamente!')->success();
                    
                    return redirect()->route('blogCategory.edit', $category->id);
                } else {
                    flash('La categoría no se pudo actualizar.')->error();
                    return redirect()->route('blogCategory.edit', $category->id);
                }
                
            }  else{
                
                flash('no se encuentra la categoría')->error();
                return redirect()->route('blogCategory.edit', $id);
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
        $category = BlogCategory::find($id);
        if ($category->delete()) {
            flash('Categoría eliminado correctamente!')->success();
            return redirect('blogCategory');
        } else{
            flash('No se pudo eliminar el categoría!')->error();   
            return redirect('blogCategory');
        }
    }
}
