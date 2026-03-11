<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int|null $country_id
 * @property float|null $latitude
 * @property float|null $longitude
 * @property int|null $timezone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Country|null $country
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class City extends Model
{
	use SoftDeletes;
	protected $table = 'cities';

	protected $casts = [
		'country_id' => 'int',
		'latitude' => 'float',
		'longitude' => 'float',
		'timezone' => 'int'
	];

	protected $fillable = [
		'code',
		'name',
		'country_id',
		'latitude',
		'longitude',
		'timezone'
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
