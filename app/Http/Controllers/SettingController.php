<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $setting = Setting::where('Company_Name', 'LIKE', "%$keyword%")
				->orWhere('Company_Address', 'LIKE', "%$keyword%")
				->orWhere('Company_Phone', 'LIKE', "%$keyword%")
				->orWhere('Company_Mobile', 'LIKE', "%$keyword%")
				->orWhere('GST_No', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $setting = Setting::paginate($perPage);
        }

        return view('setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'Company_Name' => 'required'
		]);
        $requestData = $request->all();
        
        Setting::create($requestData);

        Session::flash('flash_message', 'Setting added!');

        return redirect('setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);

        return view('setting.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);

        return view('setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'Company_Name' => 'required'
		]);
        $requestData = $request->all();
        
        $setting = Setting::findOrFail($id);
        $setting->update($requestData);

        Session::flash('flash_message', 'Setting updated!');

        return redirect('setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Setting::destroy($id);

        Session::flash('flash_message', 'Setting deleted!');

        return redirect('setting');
    }
}
