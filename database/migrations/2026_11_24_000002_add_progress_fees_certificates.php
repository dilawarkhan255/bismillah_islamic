<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/**
 * Parent progress link, monthly fees and certificates for students.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('progress_token', 40)->nullable()->unique()->after('free_trial_id'); // private link for parents
            $table->string('current_level')->nullable()->after('course');                      // e.g. "Qaida – Takhti 7", "Para 3"
            $table->unsignedTinyInteger('progress_percent')->default(0)->after('current_level');
            $table->decimal('fee_amount', 10, 2)->nullable()->after('progress_percent');       // monthly fee
            $table->string('fee_currency', 3)->default('PKR')->after('fee_amount');
            $table->unsignedTinyInteger('fee_due_day')->default(5)->after('fee_currency');      // day of month
        });

        // students added before this: give each a private parent link
        DB::table('students')->whereNull('progress_token')->orderBy('id')->pluck('id')
            ->each(fn ($id) => DB::table('students')->where('id', $id)->update(['progress_token' => Str::random(32)]));

        Schema::create('student_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->string('attendance', 10)->default('present'); // present | absent | late | leave
            $table->string('lesson')->nullable();                 // what was covered
            $table->text('note')->nullable();                     // teacher's note for parents
            $table->timestamps();

            $table->index(['student_id', 'date']);
        });

        Schema::create('fee_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->date('month');                                // first day of the month paid for
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3);
            $table->date('paid_on');
            $table->string('method', 30)->nullable();             // bank, cash, PayPal …
            $table->string('note')->nullable();
            $table->timestamps();

            $table->unique(['student_id', 'month']);
        });

        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('serial', 20)->unique();               // printed on the certificate, checkable online
            $table->string('title');                              // e.g. "Completion of Norani Qaida"
            $table->string('course')->nullable();
            $table->string('teacher_name')->nullable();
            $table->date('issued_on');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
        Schema::dropIfExists('fee_payments');
        Schema::dropIfExists('student_progress');
        Schema::table('students', function (Blueprint $table) {
            $table->dropUnique(['progress_token']);
            $table->dropColumn(['progress_token', 'current_level', 'progress_percent', 'fee_amount', 'fee_currency', 'fee_due_day']);
        });
    }
};
