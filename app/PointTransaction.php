<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PointTransaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'donner_id',
        'recipient_id',
        'amount',
        'completed',
    ];
}

