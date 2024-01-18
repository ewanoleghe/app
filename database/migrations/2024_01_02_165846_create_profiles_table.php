<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * ->nullable(); means the user is not required to have them at all times
     * $table->unsignedBigInteger('user_id');  is a foreign key::connects the DB to d user DB
     * $table->index('user_id'); ==> for quicker querry. You must add an index for any foreign key in your db
     * == STRING  short word
     * == TEXT  long sentence or paragraph
     * 
     * $table->unsignedBigInteger('user_id');  ==> connect the table to the User. A user has a profile and 
     * 
     * NEXT:: php artisan migrate        ==> ADD THIS TABLE 'profiles' TO THE DATABASE
     * 
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');   // Means this table 'profiles' belongs to a user with the signed in 'id'
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('image')->nullable();
            // $table->string('url')->nullable();   // if there is a url to be saved 
            $table->timestamps();

            $table->index('user_id');   // adding an index() for any foreign key makes the query faster

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
