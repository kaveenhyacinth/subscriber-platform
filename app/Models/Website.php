<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Website extends Model
    {
        /** @use HasFactory<\Database\Factories\WebsiteFactory> */
        use HasFactory;

        protected $fillable = [
            'title',
            'slug',
            'description',
        ];

        public function posts(): HasMany
        {
            return $this->hasMany(Post::class);
        }

        public function subscribers(): BelongsToMany
        {
            return $this->belongsToMany(User::class, table: 'subscriptions');
        }
    }
