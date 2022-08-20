<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * 
 * @property int $LA_ID
 * @property string $LA_DISPLAY_NAME
 * @property string $LA_SHORTHAND
 *
 * @package App\Models
 */
class Language extends Model
{
	protected $table = 'languages';
	protected $primaryKey = 'LA_ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LA_ID' => 'int'
	];

	protected $fillable = [
		'LA_DISPLAY_NAME',
		'LA_SHORTHAND'
	];
}
