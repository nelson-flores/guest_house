<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Media
 * 
 * @property int $id
 * @property string|null $type
 * @property string $file_path
 * @property string|null $thumbnail_path
 * @property string|null $title
 * @property string|null $description
 * @property int|null $size
 * @property string|null $mime_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Media extends Model
{
	use SoftDeletes;
	protected $table = 'medias';

	protected $casts = [
		'size' => 'int'
	];

	protected $fillable = [
		'type',
		'file_path',
		'thumbnail_path',
		'title',
		'description',
		'size',
		'mime_type'
	];
}
