<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Manpower extends Model
{

	protected $table = "manpower";
	/*use Searchable;

	protected $fillable = ['firstname', 'middlename', 'lastname', 'birthdate', 'place_of_birth', 'email', 'address', 'contact', 'created_at', 'updated_at', 'gender'];

  public function toSearchableArray()
{
  $array = $this->toArray();
     
  return array('firstname' => $array['firstname'],'firstname' => $array['firstname']);
}
*/
}


