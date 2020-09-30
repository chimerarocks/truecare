<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $icType = Type::create([
            'name' => 'IC',
            'icon' => 'IC.svg',
        ]);

        $homeCareAgencyType = Type::create([
            'name' => 'Home care agency',
            'icon' => 'Home care agency.svg',
        ]);

        $contactingStatus = Status::create([
            'name' => 'Contacting',
            'icon' => 'Contacting 0.svg',
        ]);

        $talkedToTheClientStatus = Status::create([
            'name' => 'Talked to the client',
            'icon' => 'Talked to the client.svg',
        ]);

        $assessmentScheduledStatus = Status::create([
            'name' => 'Assessment scheduled',
            'icon' => 'Assessment scheduled.svg',
        ]);

        $contractSignedStatus = Status::create([
            'name' => 'Contract Signed',
            'icon' => 'Contract Signed.svg',
        ]);

        $cancelTheClientStatus = Status::create([
            'name' => 'Cancel the client',
            'icon' => 'Cancel the client.svg',
        ]);

        DB::table('providers')->insert([
            'name' => 'Lucie Munoz',
            'email' => 'oceane.torp@brennan.us',
            'phone' => '+1 (727) 809-1539',
            'code' => '7543',
            'is_contracted' => true,
            'status_id' => $contactingStatus->id,
            'type_id' => $icType->id,
        ]);

        DB::table('providers')->insert([
            'name' => 'Winifred Henderson',
            'email' => 'landen_deckow@hotmail.com',
            'phone' => '+1 (532) 831-5321',
            'code' => '9755',
            'is_contracted' => true,
            'status_id' => $talkedToTheClientStatus->id,
            'type_id' => $icType->id,
        ]);

        DB::table('providers')->insert([
            'name' => 'Birdie Carson',
            'email' => 'dietrich_amiya@yahoo.com',
            'phone' => '+1 (673) 223-7397',
            'code' => '3421',
            'is_contracted' => false,
            'status_id' => $assessmentScheduledStatus->id,
            'type_id' => $icType->id,
        ]);

        DB::table('providers')->insert([
            'name' => 'Family Care SF, Inc.',
            'email' => 'dorothy.lesch@dickinson.me',
            'phone' => '+1 (866) 124-5438',
            'code' => '7675',
            'is_contracted' => false,
            'status_id' => $contractSignedStatus->id,
            'type_id' => $homeCareAgencyType->id,
        ]);

        DB::table('providers')->insert([
            'name' => 'Barry Alexander',
            'email' => 'reilly.julius@gmail.com',
            'phone' => '+1 (885) 163-9766',
            'code' => '5553',
            'is_contracted' => true,
            'status_id' => $cancelTheClientStatus->id,
            'type_id' => $icType->id,
        ]);
    }
}
