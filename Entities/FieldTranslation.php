<?php

namespace Modules\Form\Entities;

use Illuminate\Database\Eloquent\Model;

class FieldTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'label',
      'placeholder',
      'description',
    ];

    protected $table = 'form__field_translations';
}
