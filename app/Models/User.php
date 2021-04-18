<?php

namespace App\Models;

use App\Observers\LogObserver;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active_at' => 'datetime',
        'first_access' => 'datetime',
        'last_login' => 'datetime',
        'last_access' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        User::observe(LogObserver::class);
    }

    public function userable()
    {
        return $this->morphTo();
    }

    public function information()
    {
        return $this->hasOne(UserInformation::class, 'user_id');
    }

    public function logs()
    {
        return $this->hasMany(UserLog::class, 'user_id')
            ->orderBy('created_at', 'DESC');
    }

    public function scopeVerified($query)
    {
        return $query->where('email_verified', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function photoSrc($photo)
    {
        if (!empty($photo)) {
            $path = Storage::url(config('custom.files.photo.path').$photo);
        } else {
            $path = asset(config('custom.files.photo.file'));
        }

        return $path;
    }

    public function customConfig($item)
    {
        $config = [
            'active' => config('custom.label.active.'.$item->active),
            'email_verified' => config('custom.label.email_verified.'.$item->email_verified),
        ];

        return $config;
    }
}
