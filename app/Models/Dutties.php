<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dutties extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dutties';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'description'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the schedule for this model.
     *
     * @return App\Models\Schedule
     */
    public function schedule()
    {
        return $this->hasOne('App\Models\Schedule','duttie_id','id');
    }

    /**
     * Get the task for this model.
     *
     * @return App\Models\Task
     */
    public function task()
    {
        return $this->hasOne('App\Models\Task','duttie_id','id');
    }



}
