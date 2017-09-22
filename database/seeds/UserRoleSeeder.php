<?php

use App\Models\RadCheck;
use App\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superuser = Defender::createRole('superuser');
        $role_manager = Defender::createRole('manager');

        $admin = new User();
        $admin->name = 'QHotspot Super User';
        $admin->email = 'superuser@qtechnics.net';
        $admin->password = bcrypt('qhotspot');
        $admin->save();
        $admin->attachRole($role_superuser);

        $hs_admin = new User();
        $hs_admin->name = 'QHotspot Manager';
        $hs_admin->email = 'manager@qtechnics.net';
        $hs_admin->password = bcrypt('qhotspot');
        $hs_admin->save();
        $hs_admin->attachRole($role_manager);

        $testuser = new RadCheck();
        $testuser->UserName = 'testmysql';
        $testuser->Attribute = 'User-Password';
        $testuser->Value = 'testmysql';
        $testuser->TcKimlikNo = 12345678901;
        $testuser->op = "==";
        $testuser->save();
    }
}
