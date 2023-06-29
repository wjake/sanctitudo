<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use App\Models\Signup;

class updateEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raidhelper:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Raid Helper events';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Prepare id, key and uri
        $id = env('RAID_HELPER_ID');
        $key = env('RAID_HELPER_KEY');
        $uri = "https://raid-helper.dev/api/v3/servers/".$id."/events";

        // Create stream context 
        $context = stream_context_create(array(
            'http' => array(
                'method' => 'GET',
                'header'=> "Authorization:".$key."\r\nIncludeSignUps:true"
            )
        ));

        // Make request and format json
        $json = file_get_contents($uri, false, $context);
        $events = json_decode($json, true);

        // Assign json data to new Models
        foreach ($events['postedEvents'] as $event)
        {
            $new_event = Event::where('id', $event['id'])->first();

            if (!$new_event)
            {
                $new_event = new Event;
                $new_event->id = $event['id'];
                $new_event->channel_id = $event['channelId'];
                $new_event->leaderId = $event['leaderId'];
                $new_event->leaderName = $event['leaderName'];
            }

            $new_event->title = $event['title'];
            $new_event->description = $event['description'];
            $new_event->startTime = $event['startTime'];
            $new_event->endTime = $event['endTime'];
            $new_event->closingTime = $event['closeTime'];

            // optional values
            $new_event->imageUrl = $event['imageUrl'] ?? "";

            $new_event->save();

            Signup::where('event_id', $new_event->id)->delete();

            foreach ($event['signUps'] as $signup)
            {
                $new_signup = new Signup;
                $new_signup->event_id = $event['id'];
                $new_signup->name = $signup['name'];
                $new_signup->userId = $signup['userId'];
                $new_signup->className = $signup['className'];
                $new_signup->specName = $signup['specName'];
                $new_signup->entryTime = $signup['entryTime'];
                $new_signup->save();
            }
        }
    }
}
