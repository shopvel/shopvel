<?php
namespace Shopvel\Console\Command;

use Illuminate\Console\Command;
use Shopvel\Model\User\Backend as User;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopvel:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->askName();
        $email = $this->askEmail();
        $password = $this->askPassword();

        if ($this->confirm('Do you wish create an admin user '.$name.' <'.$email.'>?')) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password)
            ]);
            $this->info('Admin user '.$name.' <'.$email.'> successfully created!');
        }
    }

    /**
     * @return string
     */
    private function askPassword()
    {
        $password = $this->secret('Enter password');
        if (strlen(trim($password)) < 6) {
            $this->error('The Password must be at least 6.');
            return $this->askPassword();
        }
        $passwordConfirmation = $this->secret('Enter password confirmation');
        if ($password != $passwordConfirmation) {
            $this->error('The Password must match with password confirmation.');
            $this->askPassword();
        }
        return $password;
    }

    /**
     * @return string
     */
    private function askEmail()
    {
        $email = $this->ask('Enter email address');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('The email must be a valid email address.');
            return $this->askEmail();
        }
        return $email;
    }

    /**
     * @return string
     */
    private function askName()
    {
        $name = $this->ask('Enter name');
        if (strlen(trim($name)) < 2) {
            $this->error('The Name must be at least 2.');
            return $this->askName();
        }
        return $name;
    }
}