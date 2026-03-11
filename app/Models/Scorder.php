<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Scorder
 * @package App\Models
 * @version March 11, 2026, 6:02 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $orderdetails
 * @property string|\Carbon\Carbon $orderdate
 * @property string $deliverystreet
 * @property string $deliverycity
 * @property string $deliverycounty
 * @property number $ordertotal
 */
class Scorder extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'scorder';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'orderdate',
        'deliverystreet',
        'deliverycity',
        'deliverycounty',
        'ordertotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'orderdate' => 'datetime',
        'deliverystreet' => 'string',
        'deliverycity' => 'string',
        'deliverycounty' => 'string',
        'ordertotal' => 'decimal:3'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'orderdate' => 'nullable',
        'deliverystreet' => 'nullable|string|max:30',
        'deliverycity' => 'nullable|string|max:30',
        'deliverycounty' => 'nullable|string|max:30',
        'ordertotal' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderdetails()
    {
        return $this->hasMany(\App\Models\Orderdetail::class, 'orderid');
    }
}
