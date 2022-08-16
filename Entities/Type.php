<?php

namespace Modules\Form\Entities;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  const TEXT = 1;
  const TEXTAREA = 2;
  const NUMBER = 3;
  const EMAIL = 4;
  const SELECT = 5;
  const SELECTMULTIPLE = 6;
  const CHECKBOX = 7;
  const RADIO = 8;
  const LOCATION = 9;
  const PHONE = 10;
  const DATE = 11;

  /**
   * @var array
   */
  private $types = [];

  public function __construct()
  {
    $this->types = [
      [
        'id' => self::TEXT,
        'name' => trans('form::common.types.text'),
        'value' => 'text'
      ],
      [
        'id' => self::TEXTAREA,
        'name' => trans('form::common.types.textarea'),
        'value' => 'textarea'
      ],
      [
        'id' => self::NUMBER,
        'name' => trans('form::common.types.number'),
        'value' => 'number'
      ],
      [
        'id' => self::EMAIL,
        'name' => trans('form::common.types.email'),
        'value' => 'email'
      ],
      [
        'id' => self::SELECT,
        'name' => trans('form::common.types.select'),
        'value' => 'select'
      ],
      [
        'id' => self::SELECTMULTIPLE,
        'name' => trans('form::common.types.select multiple'),
        'value' => 'multiSelect'
      ],
      [
        'id' => self::CHECKBOX,
        'name' => trans('form::common.types.checkbox'),
        'value' => 'checkbox'
      ],
      [
        'id' => self::RADIO,
        'name' => trans('form::common.types.radio'),
        'value' => 'radio'
      ],
      [
        'id' => self::LOCATION,
        'name' => trans('form::common.types.location'),
        'value' => 'location'
      ],
      [
        'id' => self::PHONE,
        'name' => trans('form::common.types.phone'),
        'value' => 'phone'
      ],
      [
        'id' => self::DATE,
        'name' => trans('form::common.types.date'),
        'value' => 'date'
      ],
    ];
  }

  /**
   * Get the available statuses
   * @return array
   */
  public function lists()
  {
    return $this->types;
  }

  /**
   * Get the post status
   * @param int $id
   * @return string
   */
  public function get($id)
  {
    $id --;
    if (isset($this->types[$id])) {
      return $this->types[$id];
    }
    return $this->types[0];
  }
}
