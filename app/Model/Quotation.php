<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = 'quotation';
    protected $primaryKey = 'quotation_id';

    protected $hidden = [];
    protected $guarded = [];

}
