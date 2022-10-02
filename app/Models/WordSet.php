<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WordSet
 * 
 * @property int $WS_ID
 * @property string $WS_TITLE
 * @property bool $WS_PUBLIC
 * @property string|null $WS_DESCRIPTION
 * @property string|null $WS_CONTENT
 * @property string|null $WS_META
 * @property string|null $WS_TAGS
 * @property string|null $WS_LEVEL
 *
 * @package App\Models
 */
class WordSet extends Model
{
	protected $table = 'word_sets';
	protected $primaryKey = 'WS_ID';
	public $timestamps = false;

	// protected $casts = [
	// 	'WS_PUBLIC' => 'bool'
	// ];

	protected $fillable = [
		'WS_TITLE',
		'WS_PUBLIC',
		'WS_DESCRIPTION',
		'WS_CONTENT',
		'WS_META',
		'WS_TAGS',
		'WS_LEVEL'
	];
}
