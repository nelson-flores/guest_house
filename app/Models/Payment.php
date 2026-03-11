<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property int $id
 * @property int $reservation_id
 * @property float $amount
 * @property string|null $method
 * @property string|null $status
 * @property string|null $transaction_reference
 * @property Carbon|null $created_at
 * 
 * @property Reservation $reservation
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';
	public $timestamps = false;

	protected $casts = [
		'reservation_id' => 'int',
		'amount' => 'float'
	];

	protected $fillable = [
		'reservation_id',
		'amount',
		'method',
		'status',
		'transaction_reference'
	];

	public function reservation()
	{
		return $this->belongsTo(Reservation::class);
	}
}
