<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'slug' => 'required|max:255',
            ]);
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->visible = 1;
            $category->save();
            $response = 'success';
            $status = 200;
            $msg = "category ok - id - " .$category->id;
        } catch (\Exception $e) {
            $response = 'error';
            $msg = $e->getMessage();
            $status = 500;
        }
        return response()->json(['response' => $response, 'msg' => $msg], $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $find = Category::findOrFail($id);
            $get = $find->toArray();
        } catch (\Exception $e) {
            $get = [];
        }
        return response()->json(['category' => $get]);
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
        try {
            $request->validate([
                'name' => 'required|max:255',
                'slug' => 'required|max:255'
            ]);
            $data = ['name' =>  $request->name, 'slug' => $request->slug];
            $category = Category::find($id);
            $category->update($data, $id);
            $response = 'success';
            $status = 200;
            $msg = "category updated - id - " .$category->id;
        } catch (\Exception $e) {
            $response = 'error';
            $msg = $e->getMessage();
            $status = 500;
        }
        return response()->json(['response' => $response, 'msg' => $msg], $status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $find = Category::find($id);
            $find->delete();
            $res = 'success';
            $msg = 'Category deleted';
            $status = 200;
        } catch (\Exception $e) {
            $res = 'error';
            $msg = $e->getMessage();
            $status = 500;
        }
        return response()->json(['response' => $res, 'msg' => $msg], $status);
    }
}
