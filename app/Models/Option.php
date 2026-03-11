<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Option
 * 
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $content
 * @property string|null $content_type
 * @property bool $active
 * @property bool $multiple
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Option extends Model
{
	use SoftDeletes;
	protected $table = 'options';

	protected $casts = [
		'active' => 'bool',
		'multiple' => 'bool',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'name',
		'code',
		'content',
		'content_type',
		'active',
		'multiple',
		'parent_id'
	];
}
