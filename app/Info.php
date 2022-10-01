<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
  protected $fillable = ['name', 'price', 'book_limit'];
  public $timestamps = false;
}
