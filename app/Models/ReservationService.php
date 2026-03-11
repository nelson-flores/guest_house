<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReservationService
 * 
 * @property int $id
 * @property int $reservation_id
 * @property int $service_id
 * @property int|null $quantity
 * @property float|null $total_price
 * @property Carbon|null $created_at
 * 
 * @property Reservation $reservation
 * @property Service $service
 *
 * @package App\Models
 */
class ReservationService extends Model
{
	protected $table = 'reservation_services';
	public $timestamps = false;

	protected $casts = [
		'reservation_id' => 'int',
		'service_id' => 'int',
		'quantity' => 'int',
		'total_price' => 'float'
	];

	protected $fillable = [
		'reservation_id',
		'service_id',
		'quantity',
		'total_price'
	];

	public function reservation()
	{
		return $this->belongsTo(Reservation::class);
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
