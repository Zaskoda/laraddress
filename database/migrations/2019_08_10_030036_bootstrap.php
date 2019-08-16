<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Contact;
use App\EmailAccount;
use App\SirenService;

class Bootstrap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!config('app.admin_name') or !config('app.admin_email')) {
            die("Configuration Error: Please configure admin name and email in your .env file before running database migrations.\n");
        }

        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname')->nullable();
            $table->string('formal_name')->nullable();
            $table->date('birthday')->nullable();
            $table->timestamps();
        });

        Schema::create('phone_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contact_id')->index();
            $table->string('number', 200)->unique();
            $table->boolean('verified')->default(false);
            $table->string('verification_token', 100)->unique()->nullable();
            $table->timestamps();
        });

        Schema::create('email_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');;
            $table->bigInteger('contact_id')->index();
            $table->string('email_address', 200)->unique('account_email_unique');
            $table->boolean('verified')->default(false);
            $table->string('verification_token', 100)->unique()->nullable();
            $table->timestamps();
        });

        $contact = Contact::create([
            'nickname' => config('app.admin_name')
        ]);

        $email = EmailAccount::create([
            'email_address' => config('app.admin_email'),
            'verified' => true,
            'contact_id' => $contact->id,
        ]);

        Schema::create('postal_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contact_id')->index();
            $table->string('label')->default('Address');
            $table->string('line_1')->default('');
            $table->string('line_2')->default('');
            $table->string('city')->default('');
            $table->string('state')->default('');
            $table->string('country')->default('USA');
            $table->string('zip')->default('');
            $table->boolean('primary')->default(false);
            $table->timestamps();
        });

        Schema::create('siren_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name', 200);
            $table->string('url');
            $table->timestamps();
        });

        $twitter = SirenService::create([
            'service_name' => 'Twitter',
            'url' => 'https://twitter.com',
        ]);

        $facebook = SirenService::create([
            'service_name' => 'Facebook',
            'url' => 'https://facebook.com',
        ]);

        Schema::create('siren_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contact_id')->index();
            $table->string('account_name')->index();
            $table->bigInteger('platform_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('email_accounts');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('siren_services');
        Schema::dropIfExists('siren_accounts');
    }
}
