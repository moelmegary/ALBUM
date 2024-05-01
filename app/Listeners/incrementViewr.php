<?php

namespace App\Listeners;

use App\Events\videoViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class incrementViewr
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(videoViewer $event): void
    {
       $this-> updateViewer($event->video);
    }
    public function updateViewer($video)
    {
       $video->viewers= $video->viewers+1;
       $video->save();


    }
}
