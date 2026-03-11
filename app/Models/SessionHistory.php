<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SessionHistory
 * 
 * @property int $id
 * @property string $code
 * @property string|null $ip
 * @property string|null $browser
 * @property string|null $device
 * @property string|null $user_agent
 * @property string|null $sessionid
 * @property float|null $latiutde
 * @property float|null $longitude
 * @property bool $success
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class SessionHistory extends Model
{
	use SoftDeletes;
	protected $table = 'session_histories';

	protected $casts = [
		'latiutde' => 'float',
		'longitude' => 'float',
		'success' => 'bool',
		'user_id' => 'int'
	];

	protected $fillable = [
		'code',
		'ip',
		'browser',
		'device',
		'user_agent',
		'sessionid',
		'latiutde',
		'longitude',
		'success',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
