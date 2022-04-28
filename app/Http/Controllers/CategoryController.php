<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
//        $categories = Category::all();
//        return view('categories.index', compact('categories'));
        echo "All Categories";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('categories.create');
        echo "Create Category";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $data = $this->validate($request,[
//            'name' => 'required|string'
//        ]);
//
//        Category::create($data);
//
//        return redirect()->route('categories.index')->with('message', 'Added successfully');
        echo 'Store Category';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
//        return view('categories.show', compact('category'));
        echo 'Show Category';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
//        return view('categories.edit', compact('category'));
        echo "Edit Category";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
//        $data = $this->validate($request, [
//            'name' => 'required|string'
//        ]);
//
//        $category->update($data);
//
//        return redirect()->route('categories.index')->with('message', 'Updated Successfully');
        echo "Update Category";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
//        $category->delete();
//        return redirect()->route('categories.index')->with('message', 'Deleted Successfully');
        echo "Delete Category";
    }
}
