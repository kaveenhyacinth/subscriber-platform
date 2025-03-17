<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Post extends Model
    {
        /** @use HasFactory<\Database\Factories\PostFactory> */
        use HasFactory;

        protected $fillable = [
            'title',
            'slug',
            'content',
            'website_id',
            'email_sent_at'
        ];

        public function website(): BelongsTo
        {
            return $this->belongsTo(Website::class);
        }
    }
