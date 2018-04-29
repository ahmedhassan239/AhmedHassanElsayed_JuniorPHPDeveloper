<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clients;
use App\Channels;
use App\ClientChannel;
use Session;

class ClientsController extends Controller
{
  	public function index()
  	{
  		return view('admin.client.index');
  	}

  	public function create()
  	{
      $channels = Channels::all();
  		return view('admin.client.add', compact('channels'));
  	}
  	public function show()
  	{
  		return view('admin.client.index');
  	}

  	public function store(ClientRequest $request)
  	{
      // dd($request->all());
  		$client = new Clients;
  		$client->title =$request->title;
  		$client->description =$request->description;
  		$client->status =$request->status;
  		$client->contactPhone =$request->contactPhone;
  		$client->contractStartDate =$request->contractStartDate;
  		$client->contractEndDate =$request->contractEndDate;       
  		$client->save();

      if ($request->channels) {
        foreach ($request->channels as $channel) {
            $record = new ClientChannel;
            $record->channel_id = $channel;
            $record->client_id = $client->id;
            $record->save();
          }
      }
      Session::flash('success','Client Adde Successfuly');
      return Redirect::back();
  	}

  	public function anyData(Request $request)
    {
        /* Datatable function*/
        if ($request->ajax()) {
            $clients = Clients::getClientsList($request->start, $request->draw, $request->length);
            return response()->json($clients);
        }
    }
    public function showClientData($id)
    {
      $client = Clients::where('id',$id)->first();
      return view('admin.client.clientData', compact('client'));
    }

    public function edit($id)
    {
        $client = Clients::find($id);
        $channels = Channels::all();
        return view('admin.client.edit', compact('client','channels'));
    }

    public function update(ClientRequest $request ,$id)
    {
        $id=$request->input('id');
        $client = Clients::find($id);
        $client->title =$request->get('title');
        $client->description =$request->get('description');
        $client->status =$request->get('status');
    		$client->contactPhone =$request->get('contactPhone');
    		$client->contractStartDate =$request->get('contractStartDate');
    		$client->contractEndDate =$request->get('contractEndDate');	
    		$clintupdate = $request->all();
    		$client->update($clintupdate);
    		$client->save();

        ClientChannel::where('client_id',$id)->delete();

        if ($request->channels) {
            foreach ($request->channels as $channel) {
            $record = new ClientChannel;
            $record->channel_id = $channel;
            $record->client_id = $client->id;
            $record->save();
          }
        }

        Session::flash('success','Update done Successfuly!');
        return Redirect::back();
    }

    public function destroy($id, Clients $client)
    {
        $client->find($id)->delete();
        return Redirect::back();      
    }
}
