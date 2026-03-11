<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gender
 * 
 * @property int $id
 * @property string|null $name
 * @property string $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Gender extends Model
{
	use SoftDeletes;
	protected $table = 'genders';

	protected $fillable = [
		'name',
		'code'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
