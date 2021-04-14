<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Get All Category
    public function category() {
        
        $category = Category::all();
        return view('admin.category.category', compact('category'));
    }

    // Create Category
    public function storecategory(Request $request) {

        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);

        $data=array();
        $data['category_name']= $request->category_name;

        // ==> style insert data with DB
        // DB::table('categories')->insert($data);

        // ==> stye insert data with Model
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();


        $notification=array(
            'messege'=>'Category Added Successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }

    // Delete Category
    public function Deletecategory($id) {
        DB::table('categories')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Category Deleted Successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    // Edit Category
    public function Editcategory($id) {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit_category', compact('category'));
    }

    // Update Category
    public function Updatecategory(Request $request, $id) {

        $validateData = $request->validate([
            'category_name' => 'required|max:255'
        ]);

        $data = array();
        $data['category_name']=$request->category_name;
        $update=DB::TABLE('categories')->where('id', $id)->update($data);
        if ($update) {
            $notification=array(
                'messege'=>'Category Updated Successfully!',
                'alert-type'=>'success'
                 );
            return Redirect()->route('categories')->with($notification);
        } else {
            $notification=array(
                'messege'=>'Nothing to Update!',
                'alert-type'=>'error'
                 );
            return Redirect()->route('categories')->with($notification);
        }

    }
}
