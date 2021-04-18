<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnotherColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')
                ->after('email')
                ->unique();
            $table->boolean('email_verified')
                ->after('username')
                ->default(false);
            $table->boolean('active')
                ->after('email_verified_at')
                ->default(false);
            $table->timestamp('active_at')
                ->after('active')
                ->nullable();
            $table->string('photo')
                ->after('active_at')
                ->nullable();
            $table->bigInteger('userable_id')
                ->after('photo')
                ->nullable();
            $table->string('userable_type')
                ->after('userable_id')
                ->nullable();
            $table->ipAddress('ip_address')
                ->after('remember_token')
                ->nullable();
            $table->timestamp('first_access')
                ->after('ip_address')
                ->nullable();
            $table->timestamp('last_login')
                ->after('first_access')
                ->nullable();
            $table->timestamp('last_access')
                ->after('last_login')
                ->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletesTz('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
