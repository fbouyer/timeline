<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'color', 'user_id'];

    public function tasks()
    {
        return $this->hasMany('App\Tasks');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
