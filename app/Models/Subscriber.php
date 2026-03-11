<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscriber
 * 
 * @property int $id
 * @property string $email
 * @property bool|null $ative
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Subscriber extends Model
{
	use SoftDeletes;
	protected $table = 'subscribers';

	protected $casts = [
		'ative' => 'bool'
	];

	protected $fillable = [
		'email',
		'ative'
	];
}
