<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float $price
 * @property Carbon|null $created_at
 * 
 * @property Collection|Reservation[] $reservations
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';
	public $timestamps = false;

	protected $casts = [
		'price' => 'float'
	];

	protected $fillable = [
		'name',
		'description',
		'price'
	];

	public function reservations()
	{
		return $this->belongsToMany(Reservation::class, 'reservation_services')
					->withPivot('id', 'quantity', 'total_price');
	}
}
