<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('concussions');

        $html = "USA Hockey Concussion Information and Acknowledgement 
All sports and free play are associated with risk for a concussion, including playing, officiating or participating in ice hockey. It is important that all participants and parents learn about concussion prevention, recognition, treatment and return to play. 
A concussion is a type of traumatic brain injury-or TBI- caused by a bump or blow to the head or by a hit to the body that causes the head and brain to move quickly back and forth. Bouncing or twisting of the brain in the skull can cause chemical changes and sometimes stretching of the brain cells. A concussion disrupts the way the brain normally works. Most concussions are mild, but all concussions should be taken seriously because permanent brain damage and death can occur from another injury. A concussion may be difficult to recognize. A player does not have to be \"knocked-out\" to have a concussion- less than 10% of players actually lose consciousness. Signs and symptoms may show up right after the injury or can take hours or days to fully appear. 
If a person reports one or more symptoms or demonstrates any signs of concussion after a blow to the head or body, s/he should be kept out of practice, play or training immediately and referred to a health care professional with experience in concussion management. A concussed brain needs time to heal and the person is much more likely to have another concussion if they return to soon. Repeat concussions are usually more severe and take longer to heal. Return to play is allowed only after the individual is without symptoms, has progressed through the concussion protocol and is cleared by the health care professional.
USA Hockey provides all participants with information and educational materials about concussions, including the risk of sustaining a concussion, how to minimize these risks, concussion signs and symptoms, and USA Hockey's program for returning to play following a concussion.USA Hockey's Concussion Management Program can be found on the USA Hockey website at: http://www.usahockey.com/safety-concussions.
By checking the box and placing my initials in the box below,  participant, and participant's parent(s) or legal guardian(s) if participant is a minor, hereby acknowledges (1) that I have had the opportunity to review information on concussions provided by USA Hockey, including the signs and symptoms of a concussion, (2) that participating in the sport of ice hockey involves the risk of sustaining a concussion and that I knowingly, freely and fully assume all such risks, (3) that any participant suspected of possibly sustaining a concussion will be removed from practice or competition (and that I will remove myself from practice or competition) and not returned to practice or competition until cleared in writing by a licensed health care provider trained in the evaluation and management of concussions, and (4) that I shall follow USA Hockey's Post-Concussion Return to Play Protocol and any applicable state law prior to returning to play.
								";

        $values = [
            'html' => $html,
            'status'=>true,
        ];

        $table->insert($values);
    }
}
