<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Language
 *
 * @mixin \Eloquent
 * @property int $lang_id
 * @property string $lang_code
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereLangCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereTitle($value)
 */
class Language extends Model
{
    //
}
