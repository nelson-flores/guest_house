<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permission
 * 
 * @property int $id
 * @property int $module_id
 * @property string|null $name
 * @property string $code
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class Permission extends Model
{
	use SoftDeletes;
	protected $table = 'permissions';

	protected $casts = [
		'module_id' => 'int'
	];

	protected $fillable = [
		'module_id',
		'name',
		'code',
		'description'
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'role_permissions')
					->withPivot('id', 'needs_maker_checker', 'deleted_at')
					->withTimestamps();
	}
}
