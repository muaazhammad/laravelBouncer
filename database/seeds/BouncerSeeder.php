<?php

use Bouncer as b;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bouncer::allow('admin')->to('create');
        Bouncer::allow('admin')->to('edit');
        Bouncer::allow('admin')->to('delete');
        Bouncer::allow('writer')->to('create');
        Bouncer::allow('editor')->to('edit');

    }
}
