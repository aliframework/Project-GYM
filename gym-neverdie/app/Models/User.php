<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected static function booted()
    {
        static::created(function ($user) {
            // Logika otomatis memberikan role
            if ($user->email == 'admin@example.com') {
                // Assign role 'admin' dan update role_id
                $adminRole = Role::where('name', 'admin')->first();
                if ($adminRole) {
                    $user->assignRole($adminRole->name);
                    $user->update(['role_id' => $adminRole->id]);
                }
            } else {
                // Assign role 'user' dan update role_id
                $userRole = Role::where('name', 'user')->first();
                if ($userRole) {
                    $user->assignRole($userRole->name);
                    $user->update(['role_id' => $userRole->id]);
                }
            }
        });
    }
}
