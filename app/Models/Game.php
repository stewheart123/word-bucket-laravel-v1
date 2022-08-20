<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Game
 * 
 * @property int $GM_ID
 * @property int $GM_AUTHOR_ID
 * @property string $GM_CONTENTS
 * @property bool $GM_PUBLIC
 * @property string|null $GM_META
 * @property string $GM_TITLE
 * @property string|null $GM_DESCRIPTION
 *
 * @package App\Models
 */
class Game extends Model
{
	protected $table = 'games';
	protected $primaryKey = 'GM_ID';
	public $timestamps = false;

	// protected $casts = [
	// 	'GM_AUTHOR_ID' => 'int',
	// 	'GM_PUBLIC' => 'bool'
	// ];

	protected $fillable = [
		'GM_AUTHOR_ID',
		'GM_CONTENTS',
		'GM_PUBLIC',
		'GM_META',
		'GM_TITLE',
		'GM_DESCRIPTION'
	];
}
