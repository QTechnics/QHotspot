<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRadacctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radacct', function (Blueprint $table) {
            $table->bigInteger('RadAcctId', true);
            $table->string('AcctSessionId', 32)->default('')->index('AcctSessionId');
            $table->string('AcctUniqueId', 32)->default('')->index('AcctUniqueId');
            $table->string('UserName', 64)->default('')->index('UserName');
            $table->string('Realm', 64)->nullable()->default('');
            $table->string('NASIPAddress', 15)->default('')->index('NASIPAddress');
            $table->string('NASPortId', 15)->nullable();
            $table->string('NASPortType', 32)->nullable();
            $table->dateTime('AcctStartTime')->index('AcctStartTime');
            $table->dateTime('AcctStopTime')->index('AcctStopTime');
            $table->integer('AcctSessionTime')->nullable()->index('AcctSessionTime');
            $table->string('AcctAuthentic', 32)->nullable();
            $table->string('ConnectInfo_start', 50)->nullable();
            $table->string('ConnectInfo_stop', 50)->nullable();
            $table->bigInteger('AcctInputOctets')->nullable();
            $table->bigInteger('AcctOutputOctets')->nullable();
            $table->string('CalledStationId', 50)->default('');
            $table->string('CallingStationId', 50)->default('');
            $table->string('AcctTerminateCause', 32)->default('');
            $table->string('ServiceType', 32)->nullable();
            $table->string('FramedProtocol', 32)->nullable();
            $table->string('FramedIPAddress', 15)->default('')->index('FramedIPAddress');
            $table->integer('AcctStartDelay')->nullable();
            $table->integer('AcctStopDelay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('radacct');
    }
}
