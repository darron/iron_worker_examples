<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('SentrySeeder');
        $this->command->info('Sentry tables seeded!');
    }

}