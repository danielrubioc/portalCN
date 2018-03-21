<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Image;
use App\WorkshopCategories;
use App\Status;
//campo url
use Illuminate\Support\Str as Str;

class WorkshopCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = WorkshopCategories::latest()->paginate(10);
        return view('workshopCategories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('workshopCategories.create', ['statuses' => Status::all(['id', 'name'])]);
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
        
        $messages = array(
            'url.unique'    => 'La url ya ha sido registrada.',
            'required' => 'El campo es obligatorio',
        );
        
        $validRequest['name'] = $request->name;
        $validRequest['url'] = Str::slug($request->name, '_');
        $validator = Validator::make($validRequest, [
            'url' => 'required|string|max:255|unique:workshop_categories',
        ],  $messages);
        if ($validator->fails()) {
            return redirect('workshopCategories/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $category = new WorkshopCategories($request->all());
        $category->url = $validRequest['url'];

        if( $request->hasFile('image') ) {
            $avatar = $request->file('image');
            $random_string = md5(microtime());
            $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/workshopCategories/' . $filename ) );
            $category->image = $filename;
        }   

        
        if ($category->save()) {
            flash('Categoría creada correctamente!')->success();
            return redirect('workshopCategories');
        }else {
            flash('no se pudo crear la categoría')->error();
            return view('workshopCategories.create');
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
        return view('workshopCategories.edit', ['category' => WorkshopCategories::findOrFail($id), 'statuses' => Status::all(['id', 'name']),]);
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

        $category = WorkshopCategories::find($id); 
        $messages = array(
            'url.unique'    => 'La url ya ha sido registrada.',
            'required' => 'El campo es obligatorio',
        );
        
        $validRequest['name'] = $request->name;
        $validRequest['url'] = Str::slug($request->name, '_');
        
        if ($category->url != $validRequest['url']) {
            
            $validator = Validator::make($validRequest, [
                'url' => 'required|string|max:255|unique:workshop_categories',
            ],  $messages);
            if ($validator->fails()) {
                return redirect('workshopCategories/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput();
            }
        }
        if ($category) {
            $category->name = $request->name ? $request->name : $category->name;
            $category->status = $request->status ? $request->status : $category->status;
            $category->url = Str::slug($request->name, '-');  
            //viene una imagen nueva
            if ($request->image && $request->image != '') {

                if ($category->image && $category->image != '') {
                    $nombre_fichero = public_path() .  '/uploads/workshopCategories/' . $category->image;
                    if (file_exists($nombre_fichero)) {
                        unlink(public_path() .  '/uploads/workshopCategories/' . $category->image );
                    }
                }
                $avatar = $request->file('image');
                $random_string = md5(microtime());
                $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->save( public_path('/uploads/workshopCategories/' . $filename ) );
                $category->image = $filename;
            
            } else {
                $category->image = $category->image; 
            }

            if ($category->save()) {
                flash('La categoría '. $category->name .' se actualizó correctamente!')->success();
                
                if ($request->show) {
                    return redirect()->route('workshopCategories.index');
                }
                return redirect()->route('workshopCategories.edit', $category->id);
            } else {
                flash('La categoría no se pudo actualizar.')->error();
                return redirect()->route('workshopCategories.edit', $category->id);
            }
            
        }  else{
            
            flash('no se encuentra la categoría')->error();
            return redirect()->route('workshopCategories.edit', $id);
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
        $category = WorkshopCategories::find($id);
        if ($category->delete()) {
            flash('Categoría eliminado correctamente!')->success();
            return redirect('workshopCategories');
        } else{
            flash('No se pudo eliminar el categoría!')->error();   
            return redirect('workshopCategories');
        }
    }
}
