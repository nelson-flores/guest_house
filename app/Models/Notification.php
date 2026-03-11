<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * 
 * @property int $id
 * @property string $code
 * @property string|null $title
 * @property string|null $message
 * @property int $user_id
 * @property bool $isread
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Notification extends Model
{
	use SoftDeletes;
	protected $table = 'notifications';

	protected $casts = [
		'user_id' => 'int',
		'isread' => 'bool'
	];

	protected $fillable = [
		'code',
		'title',
		'message',
		'user_id',
		'isread'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
