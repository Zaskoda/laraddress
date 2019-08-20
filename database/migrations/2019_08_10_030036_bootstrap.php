<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Contact;
use App\EmailAccount;
use App\SirenPlatform;

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
            $table->string('label')->default('Address')->nullable();
            $table->string('line_1')->default('')->nullable();
            $table->string('line_2')->default('')->nullable();
            $table->string('city')->default('')->nullable();
            $table->string('state')->default('')->nullable();
            $table->string('country')->default('USA')->nullable();
            $table->string('zip')->default('')->nullable();
            $table->boolean('primary')->default(false);
            $table->timestamps();
        });

        Schema::create('siren_platforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('platform_name', 200)->unique();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        $twitter = SirenPlatform::create([
            'platform_name' => 'Personal Homepage',
            'url' => '',
            'icon' => 'home',
        ]);

        $twitter = SirenPlatform::create([
            'platform_name' => 'Professional Website',
            'url' => '',
            'icon' => 'globe',
        ]);

        $twitter = SirenPlatform::create([
            'platform_name' => 'Blog',
            'url' => '',
            'icon' => 'rss',
        ]);

        $twitter = SirenPlatform::create([
            'platform_name' => 'Podcast',
            'url' => '',
            'icon' => 'podcast',
        ]);

        $facebook = SirenPlatform::create([
            'platform_name' => 'Facebook',
            'url' => 'https://www.facebook.com',
            'icon' => 'facebook',
        ]);

        $facebook = SirenPlatform::create([
            'platform_name' => 'Instagram',
            'url' => 'https://www.instagram.com',
            'icon' => 'instagram',
        ]);

        $facebook = SirenPlatform::create([
            'platform_name' => 'Medium',
            'url' => 'https://medium.com',
            'icon' => 'medium',
        ]);

        $facebook = SirenPlatform::create([
            'platform_name' => 'Twitch',
            'url' => 'https://www.twitch.com',
            'icon' => 'twitch',
        ]);

        $facebook = SirenPlatform::create([
            'platform_name' => 'YouTube',
            'url' => 'https://www.youtube.com',
            'icon' => 'youtube',
        ]);

        $facebook = SirenPlatform::create([
            'platform_name' => 'Reddit',
            'url' => 'https://www.reddit.com',
            'icon' => 'reddit',
        ]);

        $facebook = SirenPlatform::create([
            'platform_name' => 'LinkedIn',
            'url' => 'https://www.linkedin.com',
            'icon' => 'linkedin',
        ]);


        $twitter = SirenPlatform::create([
            'platform_name' => 'Other',
            'url' => '',
            'icon' => '',
        ]);



        Schema::create('siren_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_name')->nullable();
            $table->bigInteger('contact_id')->index();
            $table->bigInteger('platform_id')->index();
            $table->string('profile_url')->nullable();
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
