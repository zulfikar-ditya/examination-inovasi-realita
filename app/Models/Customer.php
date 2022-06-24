<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'longitude',
        'latitude',
        'customer_type_id'
    ];

    public function rules($method = 'create', $id = null)
    {
        $validate = [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'longitude' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'customer_type_id' => 'required|exists:customer_types,id'
        ];
        return $validate;
    }

    public function loadModel($request) {foreach ($this->fillable as $key_field) {foreach ($request as $key_request => $value) {if ($key_field == $key_request) $this->setAttribute($key_field, $value);}}}

    public function customer_type()
    {
        return $this->belongsTo(CustomerType::class);
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['customer_type'] = $this->customer_type->name;
        return $toArray;
    }
}
