<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $food = Food::all()->map(fn($fd) => [
            'id' => $fd->id,
            'name' => $fd->fbname,
            'price' => $fd->fbprice,
            'image'=> $fd->image_url(),
            'cid' => $fd->category_id,
            'cname' => $fd->category->ctname
        ]);
        return Inertia::render('Food/Index', [
            'foods' => $food
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('Food/Create', [
            'categories' => Category::all()->map(fn($category) => [
                'name' => $category->ctname,
                'category' => $category->id
            ])
        ]);
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

        $attributes = $request->validate([
            'name' => 'required',
            'price' => 'numeric|required',
            'category' => 'required',
            'image' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $file = $request->hasFile('image');
        if($file){
            $newFile = $request->file('image');
            $file_path = $newFile->store('images', ['disk' => 'public']);
            Food::create([
                'fbname' => $attributes['name'],
                'fbprice' => $attributes['price'],
                'fbimage' => $file_path,
                'category_id' => $attributes['category']
            ]);
            return redirect()->route('food');
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

        return Inertia::render('Food/Update', [
            'selected_id' => $id,
            'categories' => Category::all()->map(fn($category) => [
                'name' => $category->ctname,
                'category' => $category->id
            ]),
            'foods' => Food::all()->where('id',$id)->map(fn($food) => [
                'name' => $food->fbname,
                'price' => $food->fbprice,
                'image' => $food->fbimage,
                'cid' => $food->category_id
            ])
        ]);
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
        $attributes = $request->validate([
            'name' => 'required',
            'price' => 'numeric|required',
            'category' => 'required',
            'image' =>  'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        //finding records
        //if the images not null > return to
        //images/xbrdQrWVVTvr4ocrcThU6VvvvapmBaJzpWGlSnYh.png
        $food = Food::find($id);
        if($attributes['image'] != ''){
            if(Storage::disk('public')->exists($food->fbimage)){
                Storage::disk('public')->delete($food->fbimage);
            }
            $newFile = $request->file('image');
            $filePath = $newFile->store('images', ['disk' => 'public']);
        }else{
            $filePath = null;
        }
        $food->update([
                'fbname' => $attributes['name'],
                'fbprice' => $attributes['price'],
                'fbimage' => $attributes['image'] == '' ? $food->fbimage : $filePath,
                'category_id' => $attributes['category']
        ]);
        return redirect()->route('food');
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
        $food = Food::find($id);
        if(Storage::disk('public')->exists($food->fbimage)){
            Storage::disk('public')->delete($food->fbimage);
            $food->delete();
            return redirect()->route('food');
        }
    }
}
