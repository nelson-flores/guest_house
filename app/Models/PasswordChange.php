<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PasswordChange
 * 
 * @property int $id
 * @property string $code
 * @property int $user_id
 * @property string|null $password
 * @property string $new_password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class PasswordChange extends Model
{
	use SoftDeletes;
	protected $table = 'password_changes';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $hidden = [
		'password',
		'new_password'
	];

	protected $fillable = [
		'code',
		'user_id',
		'password',
		'new_password'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
