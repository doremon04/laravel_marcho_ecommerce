<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class AttributeValue extends Model
{
    use Sluggable;

    protected $fillable = [
        'attribute_id', 'value', 'code',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'code' => [
                'source' => 'value'
            ]
        ];
    }

    public function attribute()
    {
        return $this->hasOne('App\Models\Attribute');
    }
}
