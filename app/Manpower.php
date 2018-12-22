<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
	protected $fillable = ['firstname', 'middlename', 'lastname', 'email', 'address', 'contact', 'created_at', 'updated_at'];


}
