<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $code
 * @property string|null $name
 * @property string|null $native_name
 * @property string|null $locale
 * @property string|null $idd
 * @property int|null $phone_digits_num
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class Country extends Model
{
	use SoftDeletes;
	protected $table = 'countries';

	protected $casts = [
		'phone_digits_num' => 'int'
	];

	protected $fillable = [
		'code',
		'name',
		'native_name',
		'locale',
		'idd',
		'phone_digits_num'
	];

	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
