<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Training;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record_list    = Training::OrderBy('created_at')->paginate(10);
        $title          = "Training";
        $data           = compact('title','record_list');
        return view('admin_panel.training_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title          = "Training";
        $data           = compact('title');
        return view('admin_panel.training_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($training_id)
    {
        $record_data    = Training::findOrfail(base64_decode($training_id));
        $title          = "Training";
        $data           = compact('title','training_id','record_data');
        return view('admin_panel.training_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $training_id)
    {
        $training_id = base64_decode($training_id);
        $error_message = 	[
			'training_title.required' 		=> 'Training title should be required',
			'training_file.required' 	    => 'Training image should be required',
			'mimes' 	                    => 'Image type should be jpg, jpeg, png',
		];

		$rules = [
			'training_title' 	=> 'required',
		];

        if($training_id != 0)
        {
            $rules['training_file'] = 'mimes:jpg,jpg,png';
        }
        else
        {
            $rules['training_file'] = 'required|mimes:jpg,jpg,png';
        }

        $this->validate($request, $rules, $error_message);

        if(!empty($request->file('training_file')))
        {
            $imageName = time().'_'.rand(1111,9999).'.'.$request->file('training_file')->getClientOriginalExtension();  
            $request->file('training_file')->storeAs('training_images', $imageName, 'public');  
            $request['training_image'] = $imageName;
        }

        if($training_id == 0)
        {
            \DB::beginTransaction();
				$training = new Training();
				$training->fill($request->all());
				$training->training_image 	= $imageName;
				$training->save();
			\DB::commit();
            
            return redirect()->route('training.index')->with('Success','Training image created successfully');
        }
        else
        {
            \DB::beginTransaction();
                if(!empty($imageName))
                {
                    if(Storage::disk('public')->exists('training_images/'.$request->training_img_name))
                    {
                        Storage::disk('public')->delete('training_images/'.$request->training_img_name); 
                    }
                    $request['training_image'] = $imageName; 
                }
                $count_row  = Training::findOrFail($training_id)->update($request->all());
			\DB::commit();
            return redirect()->route('training.index')->with('Success','Training image updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($training_id)
    {
        $banner = Training::findOrFail(base64_decode($training_id));
        $banner->delete();
        return redirect()->route('training.index')->with('Success','Training image deleted successfully');
    }
}
