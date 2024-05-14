<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'interest',
        'hobbies',
        'bio',
        'facebook',
        'instagram',
        'twitter',
        'dp_image'
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


    

    public function scopeOrderByFollowers($query)
    {
        return $query->withCount('followers')->orderByDesc('followers_count');
    }
    

    public function scopeFilter($query, array $filters){
        
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag'). '%');
        }
        if($filters['search'] ?? false){
            $query->where('name', 'like', '%' . request('search'). '%')
            ->orWhere('email', 'like', '%' . request('search'). '%')
            // ->orWhere('tags', 'like', '%' . request('search'). '%')
            // ->orWhere('author', 'like', '%' . request('search'). '%')
            ;
        }
    }

    // Relationship with blogs
    public function blogs(){
        return $this->hasMany(Blog::class,'user_id');
        // one user can have multiple blogs, hasMany
    }

    // Relationship with comments
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // relationship with likes
    public function likes(){
        return $this->hasMany(Like::class);
    }

    // relationship for followers
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followee_id', 'follower_id');
    }

    // relationship for following
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followee_id');
    }

    // users may have many notifications
    public function announcements()
    {
        return $this->belongsToMany(Announcement::class,'user_announcement'); 
    }

    // one user may cause to create many announcement
    public function announcements_created(){
        return $this->hasMany(Announcement::class);
    }
}
