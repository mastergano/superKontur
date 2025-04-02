<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'contacts';
    protected $fillable = ['name', 'phone', 'email', 'created_at', 'updated_at'];
}
