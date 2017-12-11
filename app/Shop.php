<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
   


  public $timestamps = true;	
    
  protected $table = 'shops';


   public function user()
    {
        return $this->belongsTo('App\User');
    }

 public function rules()
    {
        return [
            'title' => 'required',
            'city' => 'required',
            'regionId' => 'required',
            'userId' => 'required',
            'addr' =>'required'
        ];
    }




public function getTitleAttribute($value)
{
    return ucfirst($value);
}

public function setTitleAttribute($value)
{
    $this->attributes['title'] = strtolower($value);
}



public function getCityAttribute($value)
{
    return ucfirst($value);
}


public function setCityAttribute($value)
{
    $this->attributes['city'] = strtolower($value);
}


public function getAddrAttribute($value)
{
    return ucfirst($value);
}


public function setAddrAttribute($value)
{
    $this->attributes['addr'] = strtolower($value);
}















}
