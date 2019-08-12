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
            $table->string('name')->nullable();
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
            'name' => config('app.admin_name')
        ]);
        $email = EmailAccount::create([
            'email_address' => config('app.admin_email'),
            'verified' => true,
            'contact_id' => $contact->id,
        ]);

        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contact_id')->index();
            $table->string('line_1');
            $table->string('line_2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zip');
            $table->timestamps();
        });

        Schema::create('siren_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name')->index();
            $table->string('url')->index();
            $table->timestamps();
        });

        SirenService::create([
            'service_name' => 'Twitter',
            'url' => 'https://twitter.com/',
        ]);

        SirenService::create([
            'service_name' => 'Facebook',
            'url' => 'https://facebook.com/',
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
        Schema::dropIfExists('emails');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('siren_services');
        Schema::dropIfExists('siren_accounts');
    }
}
