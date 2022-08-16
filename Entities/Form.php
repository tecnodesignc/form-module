<?php

namespace Modules\Form\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use Translatable;

    protected $table = 'form__forms';

    public $translatedAttributes = [
        'title'
    ];

    protected $fillable = [
        'system_name',
        'active',
        'destination_email',
        'user_id',
        'send_confirmation',
        'template',
        'subject',
        'options'
    ];

    protected $casts = [
        'options' => 'array',
        'destination_email' => 'array',
        'send_confirmation'=>'boolean'
    ];

    public function fields()
    {
        return $this->hasMany(Field::class)->with('translations')->orderBy('order','asc');
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function user()
    {
        $driver = config('encore.user.config.driver');
        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User", 'user_id');
    }

    public function getDestinationEmailAttribute($value)
    {
        return json_decode($value);
    }

}
