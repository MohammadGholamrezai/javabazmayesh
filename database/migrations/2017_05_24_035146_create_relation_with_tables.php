<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationWithTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            //$table->integer('type_service_id')->unsigned()->change();
            $table->foreign('type_service_id')->references('id')->on('services_type');
        });

        Schema::table('lab_services', function (Blueprint $table) {
            //$table->integer('lab_id')->unsigned()->change();
            //$table->integer('service_id')->unsigned()->change();
            $table->foreign('lab_id')->references('id')->on('users');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('users_staff', function (Blueprint $table) {
            //$table->integer('employer')->unsigned()->change();
            //$table->integer('user_id')->unsigned()->change();
            $table->foreign('employer')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('lab_results', function (Blueprint $table) {
            //$table->integer('lab_id')->unsigned()->change();
            //$table->integer('user_id')->unsigned()->change();
            //$table->integer('staff_id')->unsigned()->change();
            $table->foreign('lab_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('staff_id')->references('id')->on('users_staff');
        });

        Schema::table('media', function (Blueprint $table) {
            //$table->integer('employee_id')->index()->unsigned()->change();
            //$table->integer('user_id')->index()->unsigned()->change();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('media_modules', function (Blueprint $table) {
            //$table->integer('employee_id')->index()->unsigned()->change();
            //$table->integer('user_id')->index()->unsigned()->change();
            //$table->integer('media_id')->unsigned()->change();
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('media_id')->references('id')->on('media');
        });

        Schema::table('lab_result_services', function (Blueprint $table) {
            //$table->integer('lab_result_id')->unsigned()->change();
            //$table->integer('service_id')->unsigned()->change();

            $table->foreign('lab_result_id')->references('id')->on('lab_results');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('lab_results_transactions', function (Blueprint $table) {
            //$table->integer('lab_result_id')->unsigned()->change();
            //$table->integer('owner_id')->unsigned()->change();

            $table->foreign('lab_result_id')->references('id')->on('lab_results');
            $table->foreign('owner_id')->references('id')->on('users');
        });

        Schema::table('lab_result_transactions_forward', function (Blueprint $table) {
            //$table->integer('lrt_id')->unsigned()->change();
            //$table->integer('doctor_id')->unsigned()->change();

            $table->foreign('lrt_id')->references('id')->on('lab_results_transactions');
            $table->foreign('doctor_id')->references('id')->on('users');
        });

        Schema::table('lab_result_reply_transaction', function (Blueprint $table) {
            //$table->integer('lrft_id')->unsigned()->change();
            //$table->integer('owner_id')->unsigned()->change();

            $table->foreign('lrft_id')->references('id')->on('lab_result_transactions_forward');
            $table->foreign('owner_id')->references('id')->on('users');
        });

        Schema::table('credits', function (Blueprint $table) {
            //$table->integer('user_id')->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('credit_transactions', function (Blueprint $table) {
            //$table->integer('user_id')->unsigned()->change();
            //$table->integer('credit_id')->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('credit_id')->references('id')->on('credits');
        });

        Schema::table('doctor_expertise', function (Blueprint $table) {
            //$table->integer('doctor_id')->unsigned()->change();
            //$table->integer('expertise_id')->unsigned()->change();
            //$table->integer('university_id')->unsigned()->change();

            $table->foreign('doctor_id')->references('id')->on('users');
            $table->foreign('expertise_id')->references('id')->on('expertise');
            $table->foreign('university_id')->references('id')->on('universities');
        });

        Schema::table('universities', function (Blueprint $table) {
            //$table->integer('city_id')->index()->unsigned()->change();

            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('secretaries', function (Blueprint $table) {
            //$table->integer('user_id')->index()->unsigned()->change();
            //$table->integer('secretary_id')->index()->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('secretary_id')->references('id')->on('users');
        });

        Schema::table('telephones', function (Blueprint $table) {
            //$table->integer('user_id')->index()->unsigned()->change();
            //$table->integer('city_id')->index()->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('addresses', function (Blueprint $table) {
            //$table->integer('user_id')->index()->unsigned()->change();
            //$table->integer('city_id')->index()->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('cities', function (Blueprint $table) {
            //$table->integer('province_id')->unsigned()->change();

            $table->foreign('province_id')->references('id')->on('provinces');
        });

        Schema::table('service_to_expertise', function (Blueprint $table) {
            //$table->integer('service_id')->unsigned()->change();
            //$table->integer('expertise_id')->unsigned()->change();

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('expertise_id')->references('id')->on('expertise');
        });

        Schema::table('user_insurances', function (Blueprint $table) {
            //$table->integer('user_id')->index()->unsigned()->change();
            //$table->integer('insurance_id')->index()->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('insurance_id')->references('id')->on('insurances');
        });

        Schema::table('calendars', function (Blueprint $table) {
            //$table->integer('user_id')->index()->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('calendar_details', function (Blueprint $table) {
            //$table->integer('calendar_id')->unsigned()->change();

            $table->foreign('calendar_id')->references('id')->on('calendars');
        });

        Schema::table('bookings', function (Blueprint $table) {
            //$table->integer('user_id')->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('booking_details', function (Blueprint $table) {
            //$table->integer('booking_id')->unsigned()->change();
            //$table->integer('cd_id')->unsigned()->change();
            //$table->integer('std_id')->unsigned()->change();

            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('cd_id')->references('id')->on('calendar_details');
            $table->foreign('std_id')->references('id')->on('services_to_users');
        });

        Schema::table('services_to_users', function (Blueprint $table) {
            //$table->integer('user_id')->index()->unsigned()->change();
            //$table->integer('service_id')->index()->unsigned()->change();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('service_id')->references('id')->on('services');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['type_service_id']);
        });

        Schema::table('lab_services', function (Blueprint $table) {
            $table->dropForeign(['lab_id', 'service_id']);
        });

        Schema::table('users_staff', function (Blueprint $table) {
            $table->dropForeign(['employer', 'user_id']);
        });

        Schema::table('lab_results', function (Blueprint $table) {
            $table->dropForeign(['lab_id', 'user_id', 'staff_id']);
        });

        Schema::table('media', function (Blueprint $table) {
            $table->dropForeign(['employee_id', 'user_id']);
        });

        Schema::table('media_modules', function (Blueprint $table) {
            $table->dropForeign(['employee_id', 'user_id', 'media_id']);
        });

        Schema::table('lab_result_services', function (Blueprint $table) {
            $table->dropForeign(['lab_result_id', 'service_id']);
        });

        Schema::table('lab_results_transactions', function (Blueprint $table) {
            $table->dropForeign(['lab_result_id', 'owner_id']);
        });

        Schema::table('lab_result_transactions_forward', function (Blueprint $table) {
            $table->dropForeign(['lrt_id', 'doctor_id']);
        });

        Schema::table('lab_result_reply_transaction', function (Blueprint $table) {
            $table->dropForeign(['lrft_id', 'owner_id']);
        });

        Schema::table('credits', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('credit_transactions', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'credit_id']);
        });

        Schema::table('doctor_expertise', function (Blueprint $table) {
            $table->dropForeign(['doctor_id', 'expertise_id', 'university_id']);
        });

        Schema::table('universities', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });

        Schema::table('secretaries', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'secretary_id']);
        });

        Schema::table('telephones', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'city_id']);
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'city_id']);
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
        });

        Schema::table('service_to_expertise', function (Blueprint $table) {
            $table->dropForeign(['expertise_id', 'service_id']);
        });

        Schema::table('user_insurances', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'insurance_id']);
        });

        Schema::table('calendars', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('calendar_details', function (Blueprint $table) {
            $table->dropForeign(['calendar_id']);
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('booking_details', function (Blueprint $table) {
            $table->dropForeign(['std_id', 'cd_id', 'booking_id']);
        });

        Schema::table('services_to_users', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'service_id']);
        });


    }
}
