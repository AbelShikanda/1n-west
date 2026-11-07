<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTenantToUsersTable extends Migration
{
    public function up()
    {
        if (! Schema::hasColumn('users', 'tenant')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('tenant')->default(false)->after('password');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('users', 'tenant')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('tenant');
            });
        }
    }
}
