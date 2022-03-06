<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class user extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'users';
    //protected $primaryKey = 'id';
    protected $fillable = ['_id','username','password','salt','is_active'];


}
