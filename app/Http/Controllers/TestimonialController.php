<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record_list    = Testimonial::OrderBy('created_at','DESC')->paginate(10);
        $title          = "Testimonial";
        $data           = compact('title','record_list');
        return view('admin_panel.testimonial_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title              = "Testimonial";
        $data               = compact('title');
        return view('admin_panel.testimonial_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($testimonial_id)
    {
        $record_data        = Testimonial::findOrfail(base64_decode($testimonial_id));
        $title              = "Testimonial";
        $data               = compact('title','record_data');
        return view('admin_panel.testimonial_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $testimonial_id)
    {
        $testimonial_id = base64_decode($testimonial_id);
        $error_message = 	[
			'person_name.required'          => 'Person name should be required',
			'testimonial_detail.required'   => 'Description should be required',
			'person_file.required'          => 'Image should be required',
			'mimes'                         => 'Image should be jpg, jpeg, png',
            'person_file.max'               => 'Image size max 2MB',
            'testimonial_detail.max'        => 'Description max 300 characters'
		];

		$validatedData = $request->validate([
			'person_name' 	        => 'required',
			'testimonial_detail' 	=> 'required|max:300',
        ], $error_message);

        if($testimonial_id != 0)
        {
            $validatedData[] = $request->validate([
                'person_file' 	    => 'mimes:jpeg,jpg,png|max:2048',
            ], $error_message);
        }
        else
        {
            $validatedData[] = $request->validate([
                'person_file' 	    => 'required|mimes:jpeg,jpg,png|max:2048',
            ], $error_message);
        }

        try
		{
            if(!empty($request->file('person_file')))
            {
                $imageName = time().'_'.rand(1111,9999).'.'.$request->file('person_file')->getClientOriginalExtension();  
                $request->file('person_file')->storeAs('person_photo', $imageName, 'public');
            }
            if($testimonial_id == 0)
            {   
                \DB::beginTransaction();
                    $testimonial = new Testimonial();
                    $testimonial->fill($validatedData);
                    $testimonial->person_photo = $imageName;
                    $testimonial->save();
                \DB::commit();
                return redirect()->route('testimonial.index')->with('Success','Testimonial created successfully');
            }
            else
            {
                \DB::beginTransaction();
                    if(!empty($imageName))
                    {
                        if(Storage::disk('public')->exists('person_photo/'.$request->person_img_name))
                        {
                            Storage::disk('public')->delete('person_photo/'.$request->person_img_name); 
                        }
                        $request['person_photo'] = $imageName;
                    }
                    Testimonial::findOrFail($testimonial_id)->update($request->all());
                \DB::commit();
                return redirect()->route('testimonial.index')->with('Success','Testimonial updated successfully');
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
    public function destroy($testimonial_id)
    {
        Testimonial::findOrfail(base64_decode($testimonial_id))->delete();
        return redirect()->route('testimonial.index')->with('Success','Testimonial deleted successfully');
    }
}
