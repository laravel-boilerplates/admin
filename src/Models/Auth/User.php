<?php

namespace LaravelBoilerplates\Admin\Models\Auth;

use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasUuid;

class User extends Authenticatable
{
    use SoftDeletes, HasUuid, Notifiable, HasRoles, Impersonate, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name',
        'email', 'email_verified_at',
        'password', 'driver',
        'lang', 'country_code'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];



    /**
     * +++++++++++++++++++++++++++++++++++++++++++++++++
     *  Model Accessors and Mutators.
     * +++++++++++++++++++++++++++++++++++++++++++++++++
     */

    /**
     * Get the users attributes from their name.
     *
     * @return String
     */
    public function getInitialsAttribute(): string
    {
      $initials = '';
      $words = explode(" ", $this->name);

      foreach ($words as $word) {
        $initials .= strtoupper($word[0]);
      }

      return $initials;
    }
    /**
     * Automatically select a pre-defined color based on the users name.
     *
     * @return String
     */
    public function getColorAttribute(): string
    {
      $colors = ['blue', 'indigo', 'purple', 'pink', 'red', 'orange', 'yellow', 'green', 'cyan'];
      $number = hexdec(crc32($this->name));
      $seed = (integer) substr($number, -3);
      $index = $seed % count($colors);

      return $colors[$index];
    }
    /**
     * Get the user's locale from language and country code.
     *
     * @return String
     */
    public function getLocaleAttribute(): string
    {
      return $this->lang . '_' . $this->country_code;
    }
    /**
     * Get Country Code for user.
     *
     * @return string
     */
    public function getCountryCodeAttribute(): string
    {
      return strtoupper($this->$country_code);
    }
    /**
     * Set Country Code for user.
     *
     * @param string $country_code
     */
    public function setCountryCodeAttribute(string $country_code)
    {
      $this->country_code = strtoupper($country_code);
    }



  /**
   * +++++++++++++++++++++++++++++++++++++++++++++++++
   *  Model Relations.
   * +++++++++++++++++++++++++++++++++++++++++++++++++
   */



  /**
   * +++++++++++++++++++++++++++++++++++++++++++++++++
   *  Model Scopes.
   * +++++++++++++++++++++++++++++++++++++++++++++++++
   */

   /**
    * Scope to all verified users.
    *
    * @return QueryBuilder
    */
   public function scopeVerified($query)
   {
     $query->whereNotNull(['email_verified_at', 'phone_verified_at']);
   }
   /**
    * Scope to all email verified users.
    *
    * @return QueryBuilder
    */
   public function scopeEmailVerified($query)
   {
     $query->whereNotNull('email_verified_at');
   }
   /**
    * Scope to all phone verified users.
    *
    * @return QueryBuilder
    */
   public function scopePhoneVerified($query)
   {
     $query->whereNotNull('phone_verified_at');
   }
   /**
    * Scope to all unverified users.
    *
    * @return QueryBuilder
    */
   public function scopeUnverified($query)
   {
     $query->whereNull(['email_verified_at', 'phone_verified_at']);
   }
   /**
    * Scope to all email unverified users.
    *
    * @return QueryBuilder
    */
   public function scopeEmailUnverified($query)
   {
     $query->whereNull('email_verified_at');
   }
   /**
    * Scope to all phone unverified users.
    *
    * @return QueryBuilder
    */
   public function scopePhoneUnverified($query)
   {
     $query->whereNull('phone_verified_at');
   }


   /**
    * +++++++++++++++++++++++++++++++++++++++++++++++++
    *  Impersonation properties.
    * +++++++++++++++++++++++++++++++++++++++++++++++++
    */

   /**
    * Return true or false if the user can impersonate another user.
    *
    * @param   void
    * @return  bool
    */
   public function canImpersonate()
   {
     return $this->can('users-impersonate');
   }
   /**
    * Return true or false if the user can be impersonated.
    *
    * @param   void
    * @return  bool
    */
   public function canBeImpersonated()
   {
     return ! $this->can('users-impersonate');
   }
}
