<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FreeCompany;
use App\Models\FreeCompanyMember;

class updateFreeCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'freecompany:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update FreeCompany information';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $id = env('FREE_COMPANY_ID');
        $uri = "https://xivapi.com/freecompany/".$id."?data=FCM";

        // Create stream context 
        $context = stream_context_create(array(
            'http' => array(
            'method' => 'GET'
        )));

        // Make request and format json
        $json = file_get_contents($uri, false, $context);
        $company = json_decode($json, true);

        $fc = FreeCompany::where('uid', $id)->first();

        if (!$fc)
        {
            $fc = new FreeCompany;
            $fc->uid = $company['FreeCompany']['ID'];
        }

        // Assign json data to new Models
        $fc->name = $company['FreeCompany']['Name'];
        $fc->activeMemberCount = $company['FreeCompany']['ActiveMemberCount'];
        $fc->estateGreeting = $company['FreeCompany']['Estate']['Greeting'];
        $fc->estateName = $company['FreeCompany']['Estate']['Name'];
        $fc->estatePlot = $company['FreeCompany']['Estate']['Plot'];
        $fc->formed = $company['FreeCompany']['Formed'];
        $fc->recruitment = $company['FreeCompany']['Recruitment'];
        $fc->slogan = $company['FreeCompany']['Slogan'];
        $fc->tag = $company['FreeCompany']['Tag'];
        $fc->save();

        foreach ($company['FreeCompanyMembers'] as $member)
        {
            $fc_member = FreeCompanyMember::where('uid', $member['ID'])->first();

            if (!$fc_member)
            {
                $fc_member = new FreeCompanyMember;
                $fc_member->uid = $member['ID'];
            }

            $fc_member->free_company_id = $fc->id;
            $fc_member->name = $member['Name'];
            $fc_member->rank = $member['Rank'];
            $fc_member->rankIcon = $member['RankIcon'];
            $fc_member->avatar = $member['Avatar'];
            $fc_member->save();
        }
    }
}
