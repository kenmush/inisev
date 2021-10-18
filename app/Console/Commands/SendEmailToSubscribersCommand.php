<?php

namespace App\Console\Commands;

use App\Mail\NewPostsToWebsiteMail;
use App\Models\Post;
use App\Models\TrackMail;
use DB;
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

            if (TrackMail::where('subscriber_id', $subscriber->subscriber->id)->where('post_id', $post->id)) {
                return;
            }

            $trackmail = new TrackMail();
            $trackmail->post_id = $post->id;
            $trackmail->subscriber_id = $subscriber->subscriber->id;
            $trackmail->save();

            Mail::to($subscriber->subscriber->email)
                    ->send(new NewPostsToWebsiteMail($post));

        });

    }
}
