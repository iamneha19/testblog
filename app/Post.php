<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
	
	use SoftDeletes;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'post';
	
//	protected $primaryKey = 'meeting_id';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','description','user_id'];
	
	/**
	 * Used for soft deleting
	 * @var unknown
	 */
     protected $dates = ['deleted_at'];
}
