<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record_list    = Banner::OrderBy('created_at')->paginate(10);
        $title          = "Banner";
        $data           = compact('title','record_list');
        return view('admin_panel.banner_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title          = "Banner";
        $data           = compact('title');
        return view('admin_panel.banner_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($banner_id)
    {
        $record_data    = Banner::findOrfail(base64_decode($banner_id));
        $title          = "Banner";
        $data           = compact('title','banner_id','record_data');
        return view('admin_panel.banner_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $banner_id)
    {
        $banner_id = base64_decode($banner_id);
        $error_message = 	[
			'line_first.required' 		    => 'Banner first line should be required',
			'line_second.required' 	        => 'Banner second line should be required',
			'banner_file.required' 	        => 'Banner image should be required',
			'mimes' 	                    => 'Image type should be jpg, jpeg, png',
		];

		$rules = [
			'line_first' 	=> 'required',
			'line_second' 	=> 'required',
		];

        if($banner_id != 0)
        {
            $rules['banner_file'] = 'mimes:jpg,jpg,png';
        }
        else
        {
            $rules['banner_file'] = 'required|mimes:jpg,jpg,png';
        }

        $this->validate($request, $rules, $error_message);

        if(!empty($request->file('banner_file')))
        {
            $imageName = time().'_'.rand(1111,9999).'.'.$request->file('banner_file')->getClientOriginalExtension();  
            $request->file('banner_file')->storeAs('banner_images', $imageName, 'public');  
            $request['banner_image'] = $imageName;
        }

        if($banner_id == 0)
        {
            \DB::beginTransaction();
				$banner = new Banner();
				$banner->fill($request->all());
				$banner->banner_image 	= $imageName;
				$banner->save();
			\DB::commit();
            
            return redirect()->route('banner.index')->with('Success','Banner created successfully');
        }
        else
        {
            \DB::beginTransaction();
                if(!empty($imageName))
                {
                    if(Storage::disk('public')->exists('banner_images/'.$request->banner_img_name))
                    {
                        Storage::disk('public')->delete('banner_images/'.$request->banner_img_name); 
                    }
                    $request['banner_image'] = $imageName; 
                }
                $count_row  = Banner::findOrFail($banner_id)->update($request->all());
			\DB::commit();
            return redirect()->route('banner.index')->with('Success','Banner updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($banner_id)
    {
        $banner = Banner::findOrFail(base64_decode($banner_id));
        $banner->delete();
        return redirect()->route('banner.index')->with('Success','Banner deleted successfully');
    }
}
