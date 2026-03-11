<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Guest
 * 
 * @property int $id
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $document_number
 * @property Carbon|null $created_at
 * 
 * @property Collection|Reservation[] $reservations
 *
 * @package App\Models
 */
class Guest extends Model
{
	protected $table = 'guests';
	public $timestamps = false;

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'document_number'
	];

	public function reservations()
	{
		return $this->hasMany(Reservation::class);
	}
}
