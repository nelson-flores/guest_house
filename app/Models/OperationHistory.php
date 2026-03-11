<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OperationHistory
 * 
 * @property int $id
 * @property int $user_id
 * @property string|null $code
 * @property string|null $description
 * @property string|null $classmethod
 * @property string|null $old_serialized_object
 * @property string|null $current_serialized_object
 * @property string|null $object_table
 * @property string|null $sessionid
 * @property int|null $module_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class OperationHistory extends Model
{
	use SoftDeletes;
	protected $table = 'operation_histories';

	protected $casts = [
		'user_id' => 'int',
		'module_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'code',
		'description',
		'classmethod',
		'old_serialized_object',
		'current_serialized_object',
		'object_table',
		'sessionid',
		'module_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
