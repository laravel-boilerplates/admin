<?php

namespace LaravelBoilerplates\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  /**
   * The name of the "created at" column.
   *
   * @var string
   */
  const CREATED_AT = null;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'key', 'name', 'value', 'updated_at'
  ];
}
