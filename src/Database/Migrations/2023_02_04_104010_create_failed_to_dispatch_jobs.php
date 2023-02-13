<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('failed_to_dispatch_jobs', function (Blueprint $table) {
            $table->uuid('id')->unique();

            $table->string('job_class')->index();
            $table->string('queue_connection')->nullable()->index();
            $table->string('queue_name')->nullable()->index();

            $table->longText('job_detail');
            $table->json('errors');

            $table->timestamps();
            $table->timestamp('redispatched_at')->nullable();

            $table->index('created_at');
            $table->index('updated_at');
            $table->index('redispatched_at');
        });
    }
};
