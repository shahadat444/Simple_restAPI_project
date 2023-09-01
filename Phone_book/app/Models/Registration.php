<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table="registration";
    protected $primarykey="id";
    public $Incriment="true";
    protected $keytype="int";
    public $timestamps="false";
}

