// app/database/seeds/UserTableSeeder.php
<?php

class UserTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->delete();
    
    User::create(array(
    	'name'     => 'Admin',
        'username' => 'Admin',
        'email'    => 'luthfizainnur@gmail.com',
        'password' => Hash::make('12qwaszx'),
    ));
  }
}