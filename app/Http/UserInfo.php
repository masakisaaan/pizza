<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersInfo extends Model
{
    protected $table = 'users_info_master';

    protected $fillable = ['member_mail','users_id'];

    public function productPrice() {
        return $this->belongsTo('App\User','users_id');
    }

}
