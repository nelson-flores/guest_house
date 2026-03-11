<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * 
 * @property int $id
 * @property string|null $name
 * @property string $code
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Permission[] $permissions
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	use SoftDeletes;
	protected $table = 'roles';

	protected $fillable = [
		'name',
		'code',
		'description'
	];

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'role_permissions')
					->withPivot('id', 'needs_maker_checker', 'deleted_at')
					->withTimestamps();
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
