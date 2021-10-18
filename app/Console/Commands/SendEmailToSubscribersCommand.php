<?php

namespace App\Console\Commands;

use App\Mail\NewPostsToWebsiteMail;
use App\Models\Post;
use Illuminate\Console\Command;
use Mail;

class SendEmailToSubscribersCommand extends Command
{
    protected $signature = 'inisev:sendemails {post}';

    protected $description = 'Sends emails to all subscribed users';

    public function handle()
    {
        $post = Post::findOrFail($this->argument('post'));

        $subscribers = $post->website->subscribers->each(function ($subscriber) use ($post) {

            Mail::to($subscriber->subscriber->email)
                    ->send(new NewPostsToWebsiteMail($post));

        });

    }
}
