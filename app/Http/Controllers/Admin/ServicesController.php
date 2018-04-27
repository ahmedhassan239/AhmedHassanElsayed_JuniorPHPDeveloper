<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Services;

class ServicesController extends Controller
{
    public function index ()
    {
      return view('admin.service.index');
    }

    public function store(Request $request)
  	{

  		$this->validate(request(),[
            'title'=>'required|string',
            'type'=>'required|string',
            'link'=>'required|url',
            'description'=>'required',
            'client_id'=>'required'
        ]);

  		$service = new Services;
  		$service->title = $request->title;
  		$service->type = $request->type;
  		$service->link = $request->link;
  		$service->client_id = $request->client_id;
  		$service->description = $request->description;

  		$service->save();



  		return Redirect::back()->withFlashMessage('Service Added Successfully');;
  	}

    public function edit($id)
    {
        $service = Services::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request)
    {
      $this->validate(request(),[
            'title'=>'required|string',
            'type'=>'required|string',
            'link'=>'required|url',
            'description'=>'required',
        ]);

        $id = $request->input('id');
        $service = Services::find($id);
        $service->title = $request->get('title');
        $service->description = $request->get('description');
        $service->type = $request->get('type');
        $service->link = $request->get('link');
        $serviceupdate = $request->all();
        $service->update($serviceupdate);
        $service->save();
        return Redirect::back()->withFlashMessage('Service Updated Successfully');
    }


    public function anyData(Request $request)
    {
        /* Datatable function*/
        if ($request->ajax()) {
            $service = Services::getServicesList($request->start, $request->draw, $request->length);
            return response()->json($service);
        }
    }

    public function destroy($id, Services $service)
    {
            $service->find($id)->delete();
            return Redirect::back();      
    }
}
