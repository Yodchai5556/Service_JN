<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
	 
	//const CREATED_AT = 'created_dttm';
	//const UPDATED_AT = 'updated_dttm';	 
    protected $table = 'driver';
	protected $primaryKey = 'driver';
	public $incrementing = true;
	//public $timestamps = false;
	//protected $guarded = array();
    protected $fillable = array('driver_name','car_license','passport_id','driving_license','engine_no',
                                'car_type','insurance','tel','color');
	//protected $hidden = ['created_by', 'updated_by', 'created_dttm', 'updated_dttm'];
}
