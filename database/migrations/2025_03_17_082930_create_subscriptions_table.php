<?php

    use App\Models\User;
    use App\Models\Website;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('subscriptions', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Website::class);
                $table->foreignIdFor(User::class);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('subscriptions');
        }
    };
