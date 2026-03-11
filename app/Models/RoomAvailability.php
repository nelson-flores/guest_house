<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoomAvailability
 * 
 * @property int $id
 * @property int $room_id
 * @property Carbon $date
 * @property string|null $status
 * @property int|null $reservation_id
 * @property float|null $price
 * 
 * @property Room $room
 * @property Reservation|null $reservation
 *
 * @package App\Models
 */
class RoomAvailability extends Model
{
	protected $table = 'room_availability';
	public $timestamps = false;

	protected $casts = [
		'room_id' => 'int',
		'date' => 'datetime',
		'reservation_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'room_id',
		'date',
		'status',
		'reservation_id',
		'price'
	];

	public function room()
	{
		return $this->belongsTo(Room::class);
	}

	public function reservation()
	{
		return $this->belongsTo(Reservation::class);
	}
}
