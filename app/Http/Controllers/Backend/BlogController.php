<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function BlogCategory(){

    	$blogcategory = BlogPostCategory::latest()->get();
    	return view('backend.blog.category.category_view',compact('blogcategory'));
    }


  public function BlogCategoryStore(Request $request){

       $request->validate([
    		'blog_category_name_en' => 'required',
    		'blog_category_name_hin' => 'required',
    		 
    	],[
    		'blog_category_name_en.required' => 'Input Blog Category English Name',
    		'blog_category_name_hin.required' => 'Input Blog Category Hindi Name',
    	]);

    	 

	BlogPostCategory::insert([
		'blog_category_name_en' => $request->blog_category_name_en,
		'blog_category_name_hin' => $request->blog_category_name_hin,
		'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
		'blog_category_slug_hin' => str_replace(' ', '-',$request->blog_category_name_hin),
		'created_at' => Carbon::now(),
		 

    	]);

	    $notification = array(
			'message' => 'Blog Category Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



    public function BlogCategoryEdit($id){

   $blogcategory = BlogPostCategory::findOrFail($id);
    	return view('backend.blog.category.category_edit',compact('blogcategory'));
    }




public function BlogCategoryUpdate(Request $request){

       $blogcar_id = $request->id;
    	 

	BlogPostCategory::findOrFail($blogcar_id)->update([
		'blog_category_name_en' => $request->blog_category_name_en,
		'blog_category_name_hin' => $request->blog_category_name_hin,
		'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
		'blog_category_slug_hin' => str_replace(' ', '-',$request->blog_category_name_hin),
		'created_at' => Carbon::now(),
		 

    	]);

	    $notification = array(
			'message' => 'Blog Category Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('blog.category')->with($notification);

    } // end method 




  ///////////////////////////// Blog Post ALL Methods //////////////////


  public function ViewBlogPost(){

    $blogcategory = BlogPostCategory::latest()->get();
  	$blogpost = BlogPost::latest()->get();
  	return view('backend.blog.post.post_view',compact('blogpost','blogcategory'));

  }   





}
 