<?php
namespace App\Services;

class UserService
{
    const CDN_HOST = 'https://d19rwvl8cqmee6.cloudfront.net';
    const IMG_DIR = 'images/profiles/';
    const IMG_FILE_EXTENSION = '.png';

    /*
     * @var App\User $user
     *
     */
    private $user;

    /*
     * Constructor
     *
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Get full name of the user
     *
     * @access public
     * @return string
     */
    public function getFullName(): string
    {
        return ($this->user->first_name . ' ' . $this->user->last_name);
    }

    /**
     * Get point of the user
     *
     * @access public
     * @return int
     */
    public function getPoint(): int 
    {
        return $this->user->point;
    }

    /**
     * Get last modified timestamp of the user profile
     *
     * @access public
     * @return string
     */
    public function getProfileImageUrl(): string
    {
        $filename = $this->user->id . self::IMG_FILE_EXTENSION . '?' . $this->getUpdatedTimestamp(); 

        return (self::CDN_HOST . '/' . self::IMG_DIR . $filename);
    }

    /**
     * Get last modified timestamp of the user profile
     *
     * @access private
     * @return int
     */
    private function getUpdatedTimestamp(): int
    {
        return $this->user->updated_at->timestamp;
    }
}

