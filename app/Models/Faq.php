<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Faq
 * 
 * @property int $id
 * @property string|null $question
 * @property string|null $answer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Faq extends Model
{
	use SoftDeletes;
	protected $table = 'faqs';

	protected $fillable = [
		'question',
		'answer'
	];
}
