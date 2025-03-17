<?php

    namespace App\Console\Commands;

    use App\Mail\PostCreated;
    use App\Models\Website;
    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\Mail;

    class SendNewPostEmailsToSubscribers extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'app:send-new-post-emails-to-subscribers';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Check all the newly created posts and send an email to all the subscribers of the website.';

        /**
         * Execute the console command.
         */
        public function handle()
        {
            $websites = Website::with(['subscribers'])->get();

            foreach ($websites as $website) {
                $newPosts = $website->posts()->whereNull('email_sent_at')->get();

                foreach ($newPosts as $post) {
                    $subscribers = $website->subscribers;
                    foreach ($subscribers as $subscriber) {
                        Mail::to($subscriber->email)->send(new PostCreated($post));
                    }
                    $post->update(['email_sent_at' => now()]);
                }
            }
        }
    }
