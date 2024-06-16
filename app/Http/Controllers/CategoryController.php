<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->category = $request->get('inpCategory');
        $data->save();
        $status = 'Kategori baru berhasil ditambahkan!';
        $category = Category::all();
        return view('user\categories', compact('category', 'status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $category = Category::find($id);
            $category->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Category successfully deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Category deletion failed. It maybe used in other data.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $id = $request->get('id');
        $field = $request->field;
        $value = $request->value;

        $category = Category::find($id);
        $category->$field = $value;
        $category->save();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Data berhasil disimpan'
        ), 200);
    }
}
