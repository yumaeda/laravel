<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Constant string for the administrator type
     */
    const ADMIN_TYPE = 1;

    /**
     * Constant string for the default user type
     */
    const DEFAULT_TYPE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'point',
        'first_name',
        'last_name',
        'birthday',
        'blood_type',
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
     * Check if the user is an administrator or now.
     *
     * @access public
     * @return bool true if the user is administrator; otherwise false
     */
    public function isAdmin(): bool
    {
        return ($this->type === self::ADMIN_TYPE);
    }
}

