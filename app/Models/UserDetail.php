<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserDetail
 * 
 * @property int $UD_ID
 * @property int $UD_LINKING_ID
 * @property string|null $UD_ADVERSARIES
 * @property string|null $UD_BIO
 * @property string|null $UD_META
 * @property int|null $UD_FOLLOWER_COUNT
 * @property string $UD_ACC_TYPE
 * @property int|null $UD_PROFILE_PIC
 * @property bool $UD_VISIBLE
 *
 * @package App\Models
 */
class UserDetail extends Model
{
	protected $table = 'user_details';
	protected $primaryKey = 'UD_ID';
	public $timestamps = false;

	protected $casts = [
		'UD_LINKING_ID' => 'int',
		'UD_FOLLOWER_COUNT' => 'int',
		'UD_PROFILE_PIC' => 'int',
		'UD_VISIBLE' => 'bool'
	];

	protected $fillable = [
		'UD_LINKING_ID',
		'UD_ADVERSARIES',
		'UD_BIO',
		'UD_META',
		'UD_FOLLOWER_COUNT',
		'UD_ACC_TYPE',
		'UD_PROFILE_PIC',
		'UD_VISIBLE'
	];
}
