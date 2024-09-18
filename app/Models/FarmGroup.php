<?php

namespace App\Models;

use App\Models\Sensors\Humidity;
use App\Models\Sensors\Light;
use App\Models\Sensors\SoilMoisture;
use App\Models\Sensors\Tds;
use App\Models\Sensors\Temperature;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmGroup extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id'];


    /**
     * Define a one-to-many relationship with Farm.
     * One farm group has many farms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function farms() : HasMany
    {
        return $this->hasMany(Farm::class);
    }


    /**
     * Get all of the tasks for the FarmGroup
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    //



      // sensors realtions

    /**
     * Get all of the tdsSensor for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tdsSensors(): HasMany
    {
        return $this->hasMany(Tds::class);
    }

    /**
     * Get all of the lightSensors for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lightSensors(): HasMany
    {
        return $this->hasMany(Light::class);
    }

    /**
     * Get all of the tempratureSensors for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temepratureSensors(): HasMany
    {
        return $this->hasMany(Temperature::class);
    }


    /**
     * Get all of the moistureSensors for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moistureSensors(): HasMany
    {
        return $this->hasMany(SoilMoisture::class);
    }

    /**
     * Get all of the humiditySensors for the Farm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function humiditySensors(): HasMany
    {
        return $this->hasMany(Humidity::class);
    }

}
