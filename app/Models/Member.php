<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'members';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'email', 'gender',  'age', 'ip_address', '_token', '_method'];
}
