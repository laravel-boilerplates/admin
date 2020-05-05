<?php

namespace LaravelBoilerplates\Admin\Models\Auth;

use Socialite;
use Jenssegers\Model\Model;

class Provider extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'vendor_dir'
  ];

  /**
   * Get the configuration status of the provider.
   *
   * @return string
   */
  public function getStatusAttribute()
  {
      try {
          Socialite::with($this->name);
          echo 'Configured';
      } catch (\Exception $e) {
          echo 'Pending Setup';
      }
  }
  /**
   * Get the configuration status of the provider.
   *
   * @return string
   */
  public function getClientIdAttribute()
  {
      return config('services.' . $this->name . '.client_id');
  }
}
