<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 * 
 * @property int $id
 * @property string $room_number
 * @property int $room_type_id
 * @property int|null $floor
 * @property string|null $status
 * @property Carbon|null $created_at
 * 
 * @property RoomType $room_type
 * @property Collection|Housekeeping[] $housekeepings
 * @property Collection|Reservation[] $reservations
 * @property Collection|RoomAvailability[] $room_availabilities
 *
 * @package App\Models
 */
class Room extends Model
{
	protected $table = 'rooms';
	public $timestamps = false;

	protected $casts = [
		'room_type_id' => 'int',
		'floor' => 'int'
	];

	protected $fillable = [
		'room_number',
		'room_type_id',
		'floor',
		'status'
	];

	public function room_type()
	{
		return $this->belongsTo(RoomType::class);
	}

	public function housekeepings()
	{
		return $this->hasMany(Housekeeping::class);
	}

	public function reservations()
	{
		return $this->hasMany(Reservation::class);
	}

	public function room_availabilities()
	{
		return $this->hasMany(RoomAvailability::class);
	}
}
