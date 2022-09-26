<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookMember extends Model
{
  protected $fillable = [
    'name',
    'phone',
    'email',
    'nik',
    'age',
    'weight',
    'country',
    'province',
    'city',
    'region',
    'place',
    'role',
    'book_id',
  ];
  public $timestamps = false;
}
