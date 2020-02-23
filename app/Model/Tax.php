<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
	 
	//const CREATED_AT = 'created_dttm';
	//const UPDATED_AT = 'updated_dttm';	 
    protected $table = 'tax';
	protected $primaryKey = 'tax_id';
	public $incrementing = true;
	//public $timestamps = false;
	//protected $guarded = array();
    protected $fillable = array('tax_number','tax_date','tax_no','tax_description','tax_grossamt',
                                'tax_vatamt','tax_totalamt','tax_cashby_1','tax_cheque_no','tax_dated');
	//protected $hidden = ['created_by', 'updated_by', 'created_dttm', 'updated_dttm'];
}
