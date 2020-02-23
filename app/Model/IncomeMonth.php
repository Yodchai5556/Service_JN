<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeMonth extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
	 
	//const CREATED_AT = 'created_dttm';
	//const UPDATED_AT = 'updated_dttm';	 
    protected $table = 'income_month';
	protected $primaryKey = 'income_month_id';
	public $incrementing = true;
	//public $timestamps = false;
	//protected $guarded = array();
    protected $fillable = array('month_no','month_name','income','expense','income_id');
	//protected $hidden = ['created_by', 'updated_by', 'created_dttm', 'updated_dttm'];
}
