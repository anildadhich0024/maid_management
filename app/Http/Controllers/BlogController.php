<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Blog;
use App\Models\Comment;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record_list    = Blog::OrderBy('created_at','DESC')->paginate(10);
        $title          = "Blog";
        $data           = compact('title','record_list');
        return view('admin_panel.blog_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title              = "Blog";
        $data               = compact('title');
        return view('admin_panel.blog_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($blog_id)
    {
        $record_data        = Blog::findOrfail(base64_decode($blog_id));
        $title              = "Blog";
        $data               = compact('title','record_data');
        return view('admin_panel.blog_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($blog_id)
    {
        $blog_home          = Blog::where('blog_type',config('constant.BLOG_TYPE.Home'))->get();
        $blog_covid         = Blog::where('blog_type',config('constant.BLOG_TYPE.COVID-19'))->get();
        $record_data        = Blog::findOrfail(base64_decode($blog_id));
        $title              = "Blog";
        $data               = compact('title','record_data','blog_home','blog_covid','blog_covid');
        return view('blog-details', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog_id)
    {
        $blog_id = base64_decode($blog_id);
        $error_message = 	[
			'blog_type.required'    => 'Blog type should be required',
			'blog_title.required'   => 'Blog title should be required',
			'blog_details.required' => 'Blog details should be required',
			'blog_file.required'    => 'Blog image should be required',
			'mimes'                 => 'Image should be jpg, jpeg, png',
            'max'                   => 'Image size max 2MB'
		];

		$validatedData = $request->validate([
			'blog_type' 	    => 'required',
			'blog_title' 	    => 'required',
			'blog_details' 	    => 'required',
        ], $error_message);

        if($blog_id != 0)
        {
            $validatedData[] = $request->validate([
                'blog_file' 	    => 'mimes:jpeg,jpg,png|max:2048',
            ], $error_message);
        }
        else
        {
            $validatedData[] = $request->validate([
                'blog_file' 	    => 'required|mimes:jpeg,jpg,png|max:2048',
            ], $error_message);
        }

        try
		{
            if(!empty($request->file('blog_file')))
            {
                $imageName = time().'_'.rand(1111,9999).'.'.$request->file('blog_file')->getClientOriginalExtension();  
                $request->file('blog_file')->storeAs('blog_image', $imageName, 'public');
            }

            if($blog_id == 0)
            {   
                \DB::beginTransaction();
                    $blog = new Blog();
                    $blog->fill($validatedData);
                    $blog->blog_image = $imageName;
                    $blog->save();
                \DB::commit();
                return redirect()->route('blog.index')->with('Success','Blog created successfully');
            }
            else
            {
                \DB::beginTransaction();
                    if(!empty($imageName))
                    {
                        if(Storage::disk('public')->exists('blog_image/'.$request->blog_img_name))
                        {
                            Storage::disk('public')->delete('blog_image/'.$request->blog_img_name); 
                        }
                        $request['blog_image'] = $imageName;
                    }
                    Blog::findOrFail($blog_id)->update($request->all());
                \DB::commit();
                return redirect()->route('blog.index')->with('Success','Blog updated successfully');
            }
        }
        catch (\Throwable $e)
    	{
            \DB::rollback();
            return back()->with('Failed',$e->getMessage())->withInput();
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog_id)
    {
        Blog::findOrfail(base64_decode($blog_id))->delete();
        return redirect()->route('blog.index')->with('Success','Blog deleted successfully');
    }

    public function blog_list()
    {
        $blog_list      = Blog::OrderBy('created_at','DESC')->get();
        $title          = "Blogs";
        $data           = compact('title','blog_list');
        return view('blog', $data);
    }

    public function save_comment(Request $request)
    {
        $error_message = 	[
			'full_name.required'        => 'Name should be required',
			'email_address.required'    => 'Email address should be required',
			'comment_details.required'  => 'Comment should be required',
            'regex'                     => 'Provide valid email adddress',
		];

		$validatedData = $request->validate([
			'full_name' 	    => 'required',
			'email_address' 	=> 'required|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^',
            'comment_details' 	=> 'required',
        ], $error_message);

        try
		{
            \DB::beginTransaction();
                $comment = new Comment();
                $comment->fill($request->all())->save();
                $comment->save();
            \DB::commit();
            return back()->with('Success','Comment posted successfully');
        }
        catch (\Throwable $e)
    	{
            \DB::rollback();
            return back()->with('Failed',$e->getMessage())->withInput($request->all());
    	}   
    }
}
