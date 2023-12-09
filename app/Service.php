<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'request_date', 'type', 'description', 'evaluation', 'reject_reason','status'
        ];

    /**
     * The users that belong to the services.
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'service_user')->withPivot(['status']);
    }

    /**
     * The workers that belong to the services.
     */
    public function workers()
    {
        return $this->users()->whereHas('roles',function($q){
            $q->where('name','عامل');
        });
    }

    /**
     * The supervisors that belong to the services.
     */
    public function supervisors()
    {
        return $this->users()->whereHas('roles',function($q){
            $q->where('name','مشرف');
        });
    }

    /**
     * The clients that belong to the services.
     */
    public function client()
    {
        return $this->users()->whereHas('roles',function($q){
            $q->where('name','طالب الخدمة');
        })->first();
    }
}
