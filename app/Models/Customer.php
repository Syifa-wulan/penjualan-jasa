<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

protected $table = 'customers';
protected $guarded = ['id'];
protected $fillable = [
        'name',
        'email',
        'phone',
        'token'
    ];
    protected $keyType = 'int';
    public $incrementing = true; 

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}