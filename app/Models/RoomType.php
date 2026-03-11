<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoomType
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float $price_per_night
 * @property int|null $max_adults
 * @property int|null $max_children
 * @property Carbon|null $created_at
 * 
 * @property Collection|Room[] $rooms
 *
 * @package App\Models
 */
class RoomType extends Model
{
	protected $table = 'room_types';
	public $timestamps = false;

	protected $casts = [
		'price_per_night' => 'float',
		'max_adults' => 'int',
		'max_children' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'price_per_night',
		'max_adults',
		'max_children'
	];

	public function rooms()
	{
		return $this->hasMany(Room::class);
	}
}
