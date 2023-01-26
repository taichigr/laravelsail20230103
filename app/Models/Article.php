<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
    ];

    // relation
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * likes
     *
     * @return BelongsToMany
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    /**
     * isLikedBy
     *
     * @param User|null $user
     * @return boolean
     */
    public function isLikedBy(?User $user): bool
    {
        return $user ? (bool)$this->likes->where('id', $user->id)->count(): false;
    }

    /**
     * getCountLikesAttribute
     *
     * @return integer
     */
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
}
