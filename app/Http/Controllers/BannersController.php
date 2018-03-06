<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use App\Banner;
use App\Status;
use Image;
//campo url
use Illuminate\Support\Str as Str;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::latest()->paginate(5);
        return view('banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('banners.create', ['statuses' => Status::all(['id', 'name'])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

       // mensajes de validacion
        $messages = array(
            'unique'    => ':attribute ya ha sido registrada.',
            'required' => ':attribute es obligatorio',
            'max' => ':attribute no puede ser mayor que :max caracteres',
            'email'    => ':attribute .',
            'min'      => ':attribute moet minimaal :min karakters bevatten.',
        );
        // validacion segun Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:300',
            'subtitle' => 'required|max:200',
            'color' => 'required|max:100',
            'subcolor' => 'required|max:100',
            
        ],  $messages);

        if ($validator->fails()) {
            return redirect('banners/create')
                        ->withErrors($validator)
                        ->withInput();
        }
                
        $banner = new Banner($request->all());

        if( $request->image ) {
            $image = $request->file('image');
            $random_string = md5(microtime());
            $filename = time() .'_'. $random_string . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('/uploads/banners/' . $filename ) );
            $banner->image = $filename;
        }  
        if ($banner->save()) {
            $idLast =  $banner->id; 
            flash('Banner creado correctamente!')->success();
            return redirect()->route('banners.edit', $idLast);
        }else {
            flash('no se pudo crear el Banner')->error();
            return view('banners.create');
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

        return view('banners.edit', ['banner' => Banner::findOrFail($id), 'statuses' => Status::all(['id', 'name']) ]);
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
     

        $banner = Banner::find($id); 
        if ($banner) {
                // mensajes de validacion
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
                    'title' => 'required|max:300',
                    'subtitle' => 'required|max:200',
                    'color' => 'required|max:100',
                    'image' => 'mimes:jpeg,jpg,png',
                    
                ],  $messages);

                if ($validator->fails()) {
                    return redirect('banners/create')
                                ->withErrors($validator)
                                ->withInput();
                }
            }


            
            $banner->title = $request->title ? $request->title : $banner->title;
            $banner->subtitle = $request->subtitle ? $request->subtitle : $banner->subtitle;
            $banner->color = $request->color ? $request->color : $banner->color;
            $banner->subcolor = $request->subcolor ? $request->subcolor : $banner->subcolor;
            $banner->url = $request->url ? $request->url : $banner->url ;
            $banner->status = $request->status ? $request->status : $banner->status ;
            
            //viene una imagen nueva
            if ($request->image && $request->image != '') {
                if ($banner->image && $banner->image != '') {
                    $nombre_fichero = public_path() .  '/uploads/banners/' . $banner->image;
                    if (file_exists($nombre_fichero)) {
                        unlink(public_path() .  '/uploads/banners/' . $banner->image );
                    }
                }
                $avatar = $request->file('image');
                $random_string = md5(microtime());
                $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->save( public_path('/uploads/banners/' . $filename ) );
                $banner->image = $filename;
            
            } else {
                $banner->image = $banner->image; 
            }

            if ($banner->save()) {
                if ($request->show) {
                    flash('El Banner "'. $banner->title .'" se actualizó correctamente!')->success();
                    return redirect()->route('banners.index');
                }

                flash('El Banner '. $banner->title .' se actualizó correctamente!')->success();
                return redirect()->route('banners.edit', $id);
            } else {
                flash('El Banner no se pudo actualizar.')->error();
                return redirect()->route('banners.edit', $id);
            }
            
        }  else{
            
            flash('no se encuentra el banner')->error();
            return redirect()->route('banners.edit', $id);
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
        $banner = Banner::find($id);
        if ($banner->delete()) {
            flash('Banner eliminado correctamente!')->success();
            return redirect('banners');
        } else{
            flash('No se pudo eliminar el Banner!')->error();   
            return redirect('banners');
        }
    }
}
