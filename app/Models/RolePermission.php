<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RolePermission
 * 
 * @property int $id
 * @property int $permission_id
 * @property int $role_id
 * @property bool $needs_maker_checker
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Permission $permission
 * @property Role $role
 *
 * @package App\Models
 */
class RolePermission extends Model
{
	use SoftDeletes;
	protected $table = 'role_permissions';

	protected $casts = [
		'permission_id' => 'int',
		'role_id' => 'int',
		'needs_maker_checker' => 'bool'
	];

	protected $fillable = [
		'permission_id',
		'role_id',
		'needs_maker_checker'
	];

	public function permission()
	{
		return $this->belongsTo(Permission::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
