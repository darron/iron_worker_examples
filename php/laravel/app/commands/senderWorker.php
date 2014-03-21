<?php
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use App\Models\User;

class senderWorker extends Command
{

    protected $name = 'worker:sender';
    protected $description = "Generate a new user";

    public function fire()
    {
        $ids = explode(',', $this->option('ids'));
        $emails = '';
        foreach ($ids as $id) {
            $user = User::find($id);
            $emails = $emails.','.$user->email;
        }
        $timezone = Config::get('iron.token', 'null');
        $this->line("Emails:" . $emails.'; '.$timezone);
    }

    protected function getOptions()
    {
        return array(
            array('ids', null, InputOption::VALUE_REQUIRED, 'Age of the new user')
        );
    }
}