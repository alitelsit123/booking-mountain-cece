<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
  protected $fillable = ['price'];
  public $timestamps = false;

}
