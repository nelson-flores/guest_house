<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Housekeeping
 * 
 * @property int $id
 * @property int $room_id
 * @property string|null $cleaned_by
 * @property Carbon|null $cleaned_at
 * @property string|null $notes
 * 
 * @property Room $room
 *
 * @package App\Models
 */
class Housekeeping extends Model
{
	protected $table = 'housekeeping';
	public $timestamps = false;

	protected $casts = [
		'room_id' => 'int',
		'cleaned_at' => 'datetime'
	];

	protected $fillable = [
		'room_id',
		'cleaned_by',
		'cleaned_at',
		'notes'
	];

	public function room()
	{
		return $this->belongsTo(Room::class);
	}
}
