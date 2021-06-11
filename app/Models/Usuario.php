<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;
    public $table = "usuarios";
    use HasFactory;
    public $timestamps = false;
}

/*-----ORIGINAL--------
class Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;
}
----------------*/
