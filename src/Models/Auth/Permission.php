<?php

namespace LaravelBoilerplates\Admin\Models\Auth;

use App\Models\Auth\User;

class Permission extends \Spatie\Permission\Models\Permission
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'label', 'description', 'creator_id', 'guard_name'
  ];

  /**
   * Get the route key for the model.
   *
   * @return string
   */
  public function getRouteKeyName()
  {
    return 'name';
  }
  /**
   * Getting the user that created the Permission.
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function creator()
  {
      return $this->belongsTo(User::class);
  }
  /**
   * Setting the Name attribute.
   *
   * @return string
   */
  public function setNameAttribute($name)
  {
      return $this->attributes['name'] = strtolower($name);
  }
}
