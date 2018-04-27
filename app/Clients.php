<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
   	protected $table ="clients";
    protected $fillable =[
        'id', 'title', 'description', 'status', 'contactPhone', 'contractStartDate', 'contractEndDate'
    ];

   	public function service()
   	{
    	return $this->hasMany('App\Services');
   	}

   	public function channel()
    {
        return $this->belongsToMany('App\Channels', 'client_channels');
    }

    public function haveChannel($channel_id)
 	{
 		//type casting 
 		//check if array empty return to boolean false
 		return (boolean) ClientChannel::where('channel_id', $channel_id)
 							->where('client_id', $this->id)
 							->first(['id']);
 	}

    public static function getClientsList($skip, $draw, $length)
	{

	    $query = static::select( 'id', 'title', 'description', 'status', 'contactPhone','contractStartDate','contractEndDate');


	    $clients = $query->offset($skip)->limit($length)->get();

	    $return = new \stdClass;

	    $return->draw = $draw;
	    $return->recordsTotal = static::all()->count();
	    $return->recordsFiltered = static::all()->count();

	    $return->data = array();

	    foreach($clients as $client){
	        $item = array();
	        array_push($item, $client->id);
	        array_push($item, $client->title);
	        array_push($item, $client->description);
	        array_push($item, $client->status);
	        array_push($item, $client->contactPhone);
	        array_push($item, $client->contractStartDate);
	        array_push($item, $client->contractEndDate);
	        
	        $deleteBtn = "<a href='" . url('/root/client/' . $client->id . '/delete/') . "'><i class='fa fa-trash'></i></a>";

	        $updateBtn = "<a style='margin-left:10px;' href='". url('/root/client/'.$client->id.'/edit/') ."'><i class='fa fa-edit'></i></a>";
	        $control = $deleteBtn.$updateBtn;

	        array_push($item, $control);

	        $service = "<a class = 'btn btn-success' href='" . url('/root/clients/'.$client->id.'/show') . "'>Services</a>";
	        array_push($item, $service);

	        array_push($return->data, $item);
	    }
	    return $return;
	}
}
