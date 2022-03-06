<?php 
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class content extends Model
{
    protected $connection = 'mongodb';
    
    protected $collection = 'contents';
    //protected $primaryKey = 'id';
    protected $fillable = ['_id','seo','title','keywords','description','name','content','is_active'];


}