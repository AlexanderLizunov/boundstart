<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $trello_id
 * @property string $password
 * @property string|null $remember_token
 * @property int $master
 * @property int $role
 * @property string $last_visit
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastVisit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMaster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTrelloId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	/**
	 * Return author of article
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function articles() {
		return $this->hasMany('App\Article', 'created_by', 'id');
	}
	
    public static function getFullUser($userId) {
    	
    	return User::leftJoin('roles', 'roles.role_id', '=', 'users.role')
		            ->leftJoin('permissions', 'permissions.permission_id', '=', 'roles.permission')
		            ->leftJoin('branches', 'branches.branch_id', '=', 'roles.branch')
	                ->where('id', $userId)
	                ->first();
    }
	
	public static function getFullUsers() {
		
    	return User::leftJoin('roles', 'roles.role_id', '=', 'users.role')
		           ->leftJoin('permissions', 'permissions.permission_id', '=', 'roles.permission')
		           ->leftJoin('branches', 'branches.branch_id', '=', 'roles.branch');
	}

}
