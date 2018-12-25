<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
	protected $fillable = ['firstname', 'middlename', 'lastname', 'birthdate', 'place_of_birth', 'email', 'address', 'contact', 'created_at', 'updated_at', 'gender'];


}
