<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Repository style function. Consider moving to a Repository class.
     *
     * Find a User given a username
     * @param int $username the username to find
     * @return User|null the User record, or null if not found
     */
    public static function findByUsername(string $username): User|null
    {
        return self::where('username', '=', $username)->first();
    }

    public static function findByEmail(string $email): User|null
    {
        return self::where('email', '=', $email)->first();
    }

    public function sweepscakeUserBaker(): HasMany
    {
        return $this->hasMany(SweepscakeUserBaker::class);
    }

    /**
     * Relationship between Sweepscakes and Users. A User may have one or more Bakers for a given Sweepscake so a User
     * may appear more than once in a Sweepscake, hence the distinct.
     * @return BelongsToMany
     */
    public function sweepscakes(): BelongsToMany
    {
        return $this->belongsToMany(Sweepscake::class, SweepscakeUserBaker::class)->distinct();
    }

    public function bakers(): HasManyThrough
    {
        return $this->hasManyThrough(Baker::class, SweepscakeUserBaker::class, 'user_id','id','id','baker_id');
    }

}
