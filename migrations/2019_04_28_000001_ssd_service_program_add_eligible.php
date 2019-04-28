<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class SSDServiceProgramAddEligible extends Migration
{    

    public function up()
    {
    
        $capsule = new Capsule();

        $capsule::schema()->table('ssd_service_program', function (Blueprint $table) {
            $table->string('eligible')->nullable();
           

            $table->index('eligible');
        });
    }

    public function down()
    {
        $capsule = new Capsule();
          $capsule::schema()->table('ssd_service_program', function (Blueprint $table) {
            $table->dropColumn('eligible');
        });    }


}
