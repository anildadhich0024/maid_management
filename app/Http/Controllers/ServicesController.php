<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Services;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record_list    = Services::OrderBy('created_at')->paginate(10);
        $title          = "Services";
        $data           = compact('title','record_list');
        return view('admin_panel.services_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title              = "Services";
        $data               = compact('title');
        return view('admin_panel.services_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($services_id)
    {
        $record_data        = Services::findOrfail(base64_decode($services_id));
        $title              = "Services";
        $data               = compact('title','record_data');
        return view('admin_panel.services_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $services_id)
    {
        $services_id = base64_decode($services_id);
        $error_message = 	[
			'services_title.required'       => 'Title should be required',
			'services_detail.required'      => 'Description should be required',
			'services_file.required'        => 'Image should be required',
			'mimes'                         => 'Image should be jpg, jpeg, png',
            'max'                           => 'Image size max 2MB'
		];

		$validatedData = $request->validate([
			'services_title' 	    => 'required',
			'services_detail' 	    => 'required',
        ], $error_message);

        if($services_id != 0)
        {
            $validatedData[] = $request->validate([
                'services_file' 	    => 'mimes:jpeg,jpg,png|max:2048',
            ], $error_message);
        }
        else
        {
            $validatedData[] = $request->validate([
                'services_file' 	    => 'required|mimes:jpeg,jpg,png|max:2048',
            ], $error_message);
        }

        try
		{
            if(!empty($request->file('services_file')))
            {
                $imageName = time().'_'.rand(1111,9999).'.'.$request->file('services_file')->getClientOriginalExtension();  
                $request->file('services_file')->storeAs('services_photo', $imageName, 'public');
            }
            if($services_id == 0)
            {   
                \DB::beginTransaction();
                    $services = new Services();
                    $services->fill($validatedData);
                    $services->services_photo   = $imageName;
                    $services->save();
                \DB::commit();
                return redirect()->route('service.index')->with('Success','Service created successfully');
            }
            else
            {
                \DB::beginTransaction();
                    if(!empty($imageName))
                    {
                        if(Storage::disk('public')->exists('services_photo/'.$request->services_img_name))
                        {
                            Storage::disk('public')->delete('services_photo/'.$request->services_img_name); 
                        }
                        $request['services_photo'] = $imageName;
                    }
                    Services::findOrFail($services_id)->update($request->all());
                \DB::commit();
                return redirect()->route('service.index')->with('Success','Service updated successfully');
            }
        }
        catch (\Throwable $e)
    	{
            \DB::rollback();
            return back()->with('Failed',$e->getMessage())->withInput($request->except(['_token','_method']));
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($services_id)
    {   
        Services::findOrfail(base64_decode($services_id))->delete();
        return redirect()->route('service.index')->with('Success','Service deleted successfully');
    }

    public function services_list()
    {
        $record_list        = Services::all();
        $title              = "Services";
        $data               = compact('title','record_list');
        return view('services', $data);
    }
}
