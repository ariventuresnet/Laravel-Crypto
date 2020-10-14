<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = new Category();
        $category->name = strtolower($request->name);
        $category->slug = Str::slug($request->name);
        
        $category->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Category created successfully'));
    }

    public function edit(Category $category)
    {
        return view('category.create')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        
        $category->name = strtolower($request->name);
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with(session()->flash('alert-success', 'Category updated successfully'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with(session()->flash('alert-success', 'Category deleted successfully'));
    }
}
