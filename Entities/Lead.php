<?php

namespace Modules\Form\Entities;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'form__leads';

    protected $fillable = [
        'form_id',
        'values'
    ];

    protected $casts = [
        'values'=>'array'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
