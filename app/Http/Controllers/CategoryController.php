<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function createpage()
    {
        return view("category.createpage");
    }

    public function create(Request $request)
    {
        $std = new Category();
        $std->name = $request->get('name');

        $std->save();
        return redirect()->route('category.createpage');
    }

    public function mainpage()
    {
        $category = Category::all();
        return view('category.read')->with(['categories' => $category]);
    }
    public function updatecategory($categoryid)
    {

        $std = Category::find($categoryid);

        return view('category.update')->with('category', $std);
    }

    public function updatedcategory(Request $request, $categoryid)
    {
        $std = Category::find($categoryid);
        $std->name = $request->get('name');
        $std->save();

        return redirect()->route('category.mainpage');
    }

    public function delete($categoryid)
    {
        $std = Category::destroy($categoryid);

        return redirect()->route('category.mainpage');
    }
}
