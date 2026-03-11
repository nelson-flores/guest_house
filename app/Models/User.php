<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @property int $id
 * @property string $code
 * @property string|null $profile_picture
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $password
 * @property bool $active
 * @property int|null $city_id
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $national_id
 * @property string|null $activation_token
 * @property string|null $remember_token
 * @property string|null $otp
 * @property int|null $gender_id
 * @property int|null $role_id
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Role|null $role
 * @property City|null $city
 * @property Gender|null $gender
 * @property Collection|Notification[] $notifications
 * @property Collection|OperationHistory[] $operation_histories
 * @property Collection|PasswordChange[] $password_changes
 * @property Collection|SessionHistory[] $session_histories
 *
 * @package App\Models
 */
class User extends \Illuminate\Foundation\Auth\User
{
	use SoftDeletes;
	use HasFactory;
	protected $table = 'users';

	protected $casts = [
		'active' => 'bool',
		'city_id' => 'int',
		'gender_id' => 'int',
		'role_id' => 'int'
	];

	protected $hidden = [
		'password',
		'activation_token',
		'remember_token'
	];

	protected $fillable = [
		'code',
		'profile_picture',
		'name',
		'last_name',
		'password',
		'active',
		'city_id',
		'phone',
		'email',
		'national_id',
		'activation_token',
		'remember_token',
		'otp',
		'gender_id',
		'role_id',
		'type'
	];

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function gender()
	{
		return $this->belongsTo(Gender::class);
	}

	public function notifications()
	{
		return $this->hasMany(Notification::class);
	}

	public function operation_histories()
	{
		return $this->hasMany(OperationHistory::class);
	}

	public function password_changes()
	{
		return $this->hasMany(PasswordChange::class);
	}

	public function session_histories()
	{
		return $this->hasMany(SessionHistory::class);
	}
}
