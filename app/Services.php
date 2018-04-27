<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table ="services";
    protected $fillable =[
        'id', 'client_id', 'description', 'title', 'link','type'
    ];

    public function client()
    {
        return $this->belongsTo('App\Clients');
    }


    public static function getServicesList($skip, $draw, $length)
	{

	    $query = static::select( 'id', 'title', 'description', 'link', 'type');


	    $services = $query->offset($skip)->limit($length)->get();

	    $return = new \stdClass;

	    $return->draw = $draw;
	    $return->recordsTotal = static::all()->count();
	    $return->recordsFiltered = static::all()->count();

	    $return->data = array();

	    foreach($services as $service){
	        $item = array();
	        array_push($item, $service->id);
	        array_push($item, $service->title);
	        array_push($item, $service->type);
	        array_push($item, $service->link);
	        array_push($item, $service->description);
	        
	        $deleteBtn = "<a href='" . url('/root/service/' . $service->id . '/delete/') . "'><i class='fa fa-trash'></i></a>";

	        $updateBtn = "<a style='margin-left:10px;' href='". url('/root/service/'.$service->id.'/edit/') ."'><i class='fa fa-edit'></i></a>";
	        $control = $deleteBtn.$updateBtn;

	        array_push($item, $control);


	        array_push($return->data, $item);
	    }
	    return $return;
	}
    
}
