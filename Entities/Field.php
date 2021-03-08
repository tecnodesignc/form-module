<?php

namespace Modules\Form\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Form\Presenters\FieldPresenter;

class Field extends Model
{
  use Translatable, PresentableTrait;

  protected $table = 'form__fields';

  public $translatedAttributes = [
    'label',
    'placeholder',
    'description',
  ];
  protected $fillable = [
    'type',
    'name',
    'required',
    'form_id',
    'selectable',
    'order',
  ];

  protected $presenter = FieldPresenter::class;

  protected $casts = [
    'selectable' => 'array'
  ];

  public function form()
  {
    return $this->belongsTo(Form::class);
  }


}
