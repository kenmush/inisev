<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class NewPostsToWebsiteMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Post $post;

    public function __construct(Post $post)
    {
        //
        $this->post = $post;
    }

    public function build()
    {
        return $this->markdown('emails.new-posts-to-website');
    }
}