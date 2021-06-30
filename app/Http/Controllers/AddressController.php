<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\OfficeAddress;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record_list    = OfficeAddress::paginate(10);
        $title          = "Office Address";
        $data           = compact('title','record_list');
        return view('admin_panel.address_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title              = "Office Address";
        $data               = compact('title');
        return view('admin_panel.address_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($address_id)
    {
        $record_data        = OfficeAddress::findOrfail(base64_decode($address_id));
        $title              = "Office Address";
        $data               = compact('title','record_data');
        return view('admin_panel.address_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $address_id)
    {
        $address_id = base64_decode($address_id);
        $error_message = 	[
			'address_title.required'    => 'Title should be required',
			'full_address.required'     => 'Address should be required',
			'phone_number.required'     => 'Phone number should be required',
			'iframe_url.required'       => 'Iframe MAP should be required',
		];

		$validatedData = $request->validate([
			'address_title' 	    => 'required',
			'full_address' 	        => 'required',
			'phone_number' 	        => 'required',
			'iframe_url' 	        => 'required',
        ], $error_message);

        try
		{
                
            if($address_id == 0)
            {   
                \DB::beginTransaction();
                    $address = new OfficeAddress();
                    $address->fill($request->all())->save();
                \DB::commit();
                return redirect()->route('address.index')->with('Success','Office address created successfully');
            }
            else
            {
                \DB::beginTransaction();
                    OfficeAddress::findOrFail($address_id)->update($request->all());
                \DB::commit();
                return redirect()->route('address.index')->with('Success','Office address updated successfully');
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
    public function destroy($address_id)
    {
        OfficeAddress::findOrfail(base64_decode($address_id))->delete();
        return redirect()->route('address.index')->with('Success','Office address deleted successfully');
    }

    public function address_list()
    {
        $address_list   = OfficeAddress::all();
        $title          = "Contact Us";
        $data           = compact('title','address_list');
        return view('contact', $data);
    }
}
