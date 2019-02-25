<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $player_html = '<h3>USA Hockey Registration fee – $ <span class="player-price-holder"></span></h3>
                <p>The USA Hockey Registration fee is $<span class="player-price-holder"></span> per person (exception, birth year 2012 and after). <a>Affiliate
                        fee</a> (if applicable) varies by Affiliate. If a participant plays and coaches he/she pays only
                    one registration fee.</p>

                <p>Click <a>here</a> for information about USA Hockey Member benefits.</p>';

        $manager_html = ' <h3>Managers and Volunteers.</h3>
                <p>Register here when your program has confirmed your participation. There is no charge for this
                    registration; it does NOT allow on-ice participation.</p>

                <p>Click <a>here</a> for information about USA Hockey Member benefits.</p>';

        $officials_html = '<h3>Officials (Referees)</h3>
                <div class="ragi-right-referee" style="" id="refereesSelection">
                    <p>All Officials are required to attend a USA Hockey Officiating
                        Seminar each season. Please do not proceed with your registration
                        until you have verified you can attend a seminar. <br><a
                                href="http://www.usahockey.com/page/show/896986-seminars" target="_blank"><u>Click
                                Here</u> </a> for a
                        list of the seminars. Most seminars are held starting in August 2018 until November 2018 be sure
                        to check availability in your area <font color="red">BEFORE</font> you register. All
                        requirements for this registration need to be completed by March 15, 2019.
                    </p>
                    <p>
                        Be advised due to child
                        labor restrictions in some states, there may be a minimum age
                        requirement to officiate ice hockey. If the child registering as
                        an Official is under the age of 14, contact your Local Supervisor
                        of Officials to learn more about any minimum age restrictions in
                        your area prior to completing this registration. For contact
                        information, <br><a href="http://www.usahockey.com/page/show/898352-directory"
                                            target="_blank"><u>Click Here</u>
                        </a>!

                    <p>I understand that, while officiating USA HOCKEY sanctioned games, I am acting as an independent
                        contractor and not as an employee of USA HOCKEY or its affiliate associations, local
                        associations, or any officiating organization.
                    </p>
                </div>
                ';
        $terms = [
            [
                'member_type_id' => 1,
                'html' => $player_html,
                'default' => $player_html,
            ],
            [
                'member_type_id' => 2,
                'html' => $manager_html,
                'default' => $manager_html,
            ],
            [
                'member_type_id' => 3,
                'html' => $officials_html,
                'default' => $officials_html,
            ],

        ];
        $table = DB::table('terms');

        foreach ($terms as $term) {
            $term['user_id'] = 1;
            $term['created_at'] = date('Y-m-d H:i:s');
            $table->insert($term);
        }
    }
}
