<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 * 
 * @property int $id
 * @property int $guest_id
 * @property int $room_id
 * @property Carbon $check_in
 * @property Carbon $check_out
 * @property int $adults
 * @property int $children
 * @property string|null $status
 * @property float|null $total_amount
 * @property Carbon|null $created_at
 * 
 * @property Guest $guest
 * @property Room $room
 * @property Collection|Payment[] $payments
 * @property Collection|Service[] $services
 * @property Collection|RoomAvailability[] $room_availabilities
 *
 * @package App\Models
 */
class Reservation extends Model
{
	protected $table = 'reservations';
	public $timestamps = false;

	protected $casts = [
		'guest_id' => 'int',
		'room_id' => 'int',
		'check_in' => 'datetime',
		'check_out' => 'datetime',
		'adults' => 'int',
		'children' => 'int',
		'total_amount' => 'float'
	];

	protected $fillable = [
		'guest_id',
		'room_id',
		'check_in',
		'check_out',
		'adults',
		'children',
		'status',
		'total_amount'
	];

	public function guest()
	{
		return $this->belongsTo(Guest::class);
	}

	public function room()
	{
		return $this->belongsTo(Room::class);
	}

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}

	public function services()
	{
		return $this->belongsToMany(Service::class, 'reservation_services')
					->withPivot('id', 'quantity', 'total_price');
	}

	public function room_availabilities()
	{
		return $this->hasMany(RoomAvailability::class);
	}
}
