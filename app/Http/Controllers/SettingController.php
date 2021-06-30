<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Setting;

class SettingController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($setting_id)
    {
        $record_data        = Setting::findOrfail(base64_decode($setting_id));
        $title              = "Time Setting";
        $data               = compact('title','record_data');
        return view('admin_panel.setting', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $setting_id)
    {
        $setting_id = base64_decode($setting_id);
        $error_message = 	[
			'required'               => 'All fields should be required',
			'mon_fri_close.after'    => 'Mon - Fri close time shold be greater then Mon - Fri open time',
			'sat_sun_close.after'    => 'Sat - Sun close time shold be greater then Sat - Sun open time',
		];

		$validatedData = $request->validate([
			'mon_fri_open' 	    => 'required',
			'mon_fri_close' 	=> 'required|after:mon_fri_open',
			'sat_sun_open' 	    => 'required',
			'sat_sun_close' 	=> 'required|after:sat_sun_open',
        ], $error_message);

        try
		{
            \DB::beginTransaction();
                Setting::findOrFail($setting_id)->update($request->all());
            \DB::commit();
            return back()->with('Success','Time updated successfully');
        }
        catch (\Throwable $e)
    	{
            \DB::rollback();
            return back()->with('Failed',$e->getMessage())->withInput();
    	}
    }
}
