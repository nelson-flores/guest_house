<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Partner
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $logo
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Partner extends Model
{
	use SoftDeletes;
	protected $table = 'partners';

	protected $fillable = [
		'name',
		'logo',
		'description'
	];
}
