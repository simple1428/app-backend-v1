<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Category::with('products')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create(
                [...$request->validate(
                    [
                        'name' => 'required|string|max:20',
                        'description' => 'required'

                    ]
                )]
        );
        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category->load('products');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    { 
        // return $request;
        
        $category->update(
                $request->validate(
                    [
                        'name' => 'required|string|max:20',
                        'description' => 'required'

                    ]
                )
        );
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    
    {
        $category->delete();
       return   response(status: 204);
    }
}