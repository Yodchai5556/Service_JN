<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
	 
	//const CREATED_AT = 'created_dttm';
	//const UPDATED_AT = 'updated_dttm';	 
    protected $table = 'income_history';
	protected $primaryKey = 'income_history_id';
	public $incrementing = true;
	//public $timestamps = false;
	//protected $guarded = array();
    protected $fillable = array('income','expense','year_no','income_id');
	//protected $hidden = ['created_by', 'updated_by', 'created_dttm', 'updated_dttm'];
}
