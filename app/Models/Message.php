<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 * 
 * @property int $id
 * @property string $email
 * @property string $subject
 * @property string $name
 * @property string $message
 * @property bool|null $refused
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Message extends Model
{
	use SoftDeletes;
	protected $table = 'messages';

	protected $casts = [
		'refused' => 'bool'
	];

	protected $fillable = [
		'email',
		'subject',
		'name',
		'message',
		'refused'
	];
}
