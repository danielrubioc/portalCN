<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
//campo url
use Illuminate\Support\Str as Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::latest()->paginate(5);
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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
        $category = new Category($request->all());
        $category->status = 1;
        $category->url = Str::slug($request->name, '-');
        if ($category->save()) {
            flash('Categoría creada correctamente!')->success();
            return redirect('categories');
        }else {
            flash('no se pudo crear la categoría')->error();
            return view('categories.create');
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
        return view('categories.edit', ['category' => Category::findOrFail($id)]);
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
        $category = Category::find($id); 
            if ($category) {
                $category->name = $request->name ? $request->name : $category->name;
                $category->status = $request->status ? $request->status : $category->status;
                $category->url = Str::slug($request->name, '-');    
                if ($category->save()) {
                    flash('La categoría '. $category->name .' se actualizó correctamente!')->success();
                    
                    if ($request->show) {
                        return redirect()->route('categories.index');
                    }
                    return redirect()->route('categories.edit', $category->id);
                } else {
                    flash('La categoría no se pudo actualizar.')->error();
                    return redirect()->route('categories.edit', $category->id);
                }
                
            }  else{
                
                flash('no se encuentra la categoría')->error();
                return redirect()->route('categories.edit', $id);
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
        $category = Category::find($id);
        if ($category->delete()) {
            flash('Categoría eliminado correctamente!')->success();
            return redirect('categories');
        } else{
            flash('No se pudo eliminar el categoría!')->error();   
            return redirect('categories');
        }
    }
}
