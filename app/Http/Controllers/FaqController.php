<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record_list    = Faq::paginate(10);
        $title          = "FAQ's";
        $data           = compact('title','record_list');
        return view('admin_panel.faq_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title              = "Faq's";
        $data               = compact('title');
        return view('admin_panel.faq_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($faq_id)
    {
        $record_data        = Faq::findOrfail(base64_decode($faq_id));
        $title              = "FAQ's";
        $data               = compact('title','record_data');
        return view('admin_panel.faq_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faq_id)
    {
        $faq_id = base64_decode($faq_id);
        $error_message = 	[
			'faq_question.required'     => 'Question should be required',
			'faq_answer.required'       => 'Answer should be required',
		];

		$validatedData = $request->validate([
			'faq_question' 	    => 'required',
			'faq_answer' 	    => 'required',
        ], $error_message);

        try
		{
                
            if($faq_id == 0)
            {   
                \DB::beginTransaction();
                    $faq = new Faq();
                    $faq->fill($validatedData)->save();
                \DB::commit();
                return redirect()->route('faq.index')->with('Success','FAQ created successfully');
            }
            else
            {
                \DB::beginTransaction();
                    Faq::findOrFail($faq_id)->update($request->all());
                \DB::commit();
                return redirect()->route('faq.index')->with('Success','FAQ updated successfully');
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
    public function destroy($faq_id)
    {
        Faq::findOrfail(base64_decode($faq_id))->delete();
        return redirect()->route('faq.index')->with('Success','FAQ deleted successfully');
    }

    public function faq_list()
    {
        $record_list    = Faq::all();
        $title          = "FAQ's";
        $data           = compact('title','record_list');
        return view('faq', $data);
    }
}
