<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebView extends Model
{
  public $timestamps = false;
  protected $fillable = ['view_code'];
}
