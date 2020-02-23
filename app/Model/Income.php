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
    protected $table = 'income';
	protected $primaryKey = 'income_id';
	public $incrementing = true;
	//public $timestamps = false;
	//protected $guarded = array();
    protected $fillable = array('total_income','total_expense','year_no','produre_id');
	//protected $hidden = ['created_by', 'updated_by', 'created_dttm', 'updated_dttm'];
}
