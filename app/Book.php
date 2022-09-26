<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = [
    'date','total_price','payment_status','payment_success_at','snap_token'
  ];
  public $timestamps = false;

  public function members() {
    return $this->hasMany('App\BookMember', 'book_id');
  }
}
