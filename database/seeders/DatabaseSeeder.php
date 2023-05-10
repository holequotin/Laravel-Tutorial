<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Exam::factory(10)->create();
        $user = User::factory()->create([
            'email' => 'holequoctin@gmail.com',
            'name' =>'Ho Le Quoc Tin'
        ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel,javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston,MA',
        //     'email' => 'email1@gmail.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec odio eu velit
        //     vestibulum commodo. Nulla aliquet sapien quis ante interdum, eu ultrices quam consequat.
        //     Aenean rhoncus metus libero, sit amet vehicula lorem vestibulum a. Sed et posuere eros. Integer
        //     sollicitudin dui sed enim efficitur sollicitudin. Praesent ut risus in nibh elementum posuere.
        //     Sed maximus nisl justo, eu maximus felis iaculis vel. Vivamus pretium ex id diam placerat, vel tristique orci convallis. Sed id enim id justo consequat congue. Sed lobortis lectus vitae elit bibendum, nec venenatis ex venenatis. Cras quis nulla eget quam sagittis suscipit. Duis feugiat felis ac mauris feugiat, in lacinia mauris aliquam. Donec eget ex vitae lectus malesuada malesuada a euismod augue.'
        // ]);
        // Listing::create([
        //     'title' => 'Full Stack Developer',
        //     'tags' => 'laravel,javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston,MA',
        //     'email' => 'email1@gmail.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec odio eu velit
        //     vestibulum commodo. Nulla aliquet sapien quis ante interdum, eu ultrices quam consequat.
        //     Aenean rhoncus metus libero, sit amet vehicula lorem vestibulum a. Sed et posuere eros. Integer
        //     sollicitudin dui sed enim efficitur sollicitudin. Praesent ut risus in nibh elementum posuere.
        //     Sed maximus nisl justo, eu maximus felis iaculis vel. Vivamus pretium ex id diam placerat, vel tristique orci convallis. Sed id enim id justo consequat congue. Sed lobortis lectus vitae elit bibendum, nec venenatis ex venenatis. Cras quis nulla eget quam sagittis suscipit. Duis feugiat felis ac mauris feugiat, in lacinia mauris aliquam. Donec eget ex vitae lectus malesuada malesuada a euismod augue.'
        // ]);
    }
}
