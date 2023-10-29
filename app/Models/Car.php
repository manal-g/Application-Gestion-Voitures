<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'vin',
        'model',
        'brand',
        'color',
        'owner_id',
    ];

    //hadi hiya li ghay3ref menha anaho kayn wa7ed l foreign key bin car w owner
    public function owner()
    {
        //anna lcar 3endha one and only one user
        //and the foriegn key howa dak lparamertr 'owner_id'
        return $this->belongsTo(User::class, 'owner_id');
    }
}
