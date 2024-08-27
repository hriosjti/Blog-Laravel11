<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\categorySeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Post::create([
        //     'title' => 'Israel stages heavy airstrikes on Lebanon as Hezbollah launches attack over slain top commander',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-article-1',
        //     'body' => 'JERUSALEM (AP) — Israel launched a wave of airstrikes across southern Lebanon early Sunday in what it said was a pre-emptive strike on Hezbollah, as the militant group said it had launched hundreds of rockets and drones to avenge the killing of one of its top commanders last month. The heavy exchange of fire threatened to trigger an all-out war that could draw in the United States, Iran and militant groups across the region. It could also torpedo efforts to forge a cease-fire in Gaza, where Israel has been at war with the Palestinian group Hamas, an ally of Hezbollah, for over 10 months. By mid-morning, it appeared that the exchange had ended, with both sides saying they had confined their attacks to military targets. But the situation remained tense, and the full extent of casualties and damage was not immediately known. At least three people were killed in the strikes on Lebanon. The Israeli military said Hezbollah was planning to launch a heavy barrage of rockets and missiles toward Israel. Soon after, Hezbollah announced it had launched an attack on Israeli military positions as an initial response to the killing of Fouad Shukur, one of its founders, in an Israeli airstrike in Beirut last month. The attacks came as Egypt hosts a new round of talks aimed at ending the Israel-Hamas war. Hezbollah has said it will halt the fighting if there is a cease-fire in Gaza. Iran supports both groups as well as militants in Syria, Iraq and Yemen who might join any larger conflict. Israeli Prime Minister Benjamin Netanyahu, speaking at the start of a Cabinet meeting, said the military had eliminated “thousands of rockets that were aimed at northern Israel” and urged citizens to adhere to directives from the Home Front Command. “We are determined to do everything to defend our country, to return the residents of the north securely to their homes and to continue upholding a simple rule: Whoever harms us — we will harm them,” he said. Air raid sirens were reported throughout northern Israel, and Israels Ben-Gurion international airport closed and diverted flights for approximately an hour due to the threat of attack. Israel’s Home Front Command has raised the alert level in northern Israel and encouraged people to stay near bomb shelters. Lt. Col. Nadav Shoshani, an Israeli military spokesman, said Hezbollah had intended to hit targets in northern and central Israel. He said initial assessments found “very little damage” in Israel, but that the military remained on high alert. He said around 100 Israeli aircraft took part in Sunday’s strikes. Lebanon’s Health Ministry reported that two people were killed and another two wounded in the strikes in southern Lebanon. Separately, a fighter for the Amal group, which is allied with Hezbollah, was killed in a strike on a car, Amal said.',
        // ]);
        $this->call([categorySeeder::class, UserSeeder::class]);
        Post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
