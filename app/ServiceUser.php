<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceUser extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'service_id', 'user_id', 'status'
        ];

    protected $table = 'service_user';

    /**
     * Get the users for the blog post.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the users for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
