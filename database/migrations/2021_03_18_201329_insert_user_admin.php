<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertUserAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $email =  'admin@gmail.com';
        $password = bcrypt('admin');

        DB::table('users')->insert([
            'name'     => 'Administrador',
            'usertype' => 'admin',
            'email'    => $email,
            'password' => $password
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $email =  'admin@gmail.com';
        DB::delete("DELETE FROM users WHERE email = ? ", [$email]);
    }
}
