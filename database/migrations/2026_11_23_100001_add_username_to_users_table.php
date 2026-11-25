<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
        });

        // Isi username untuk user lama (diambil dari bagian depan email, dibuat unik)
        $used = [];
        foreach (DB::table('users')->orderBy('id')->get() as $user) {
            $base = Str::slug(Str::before($user->email, '@'), '') ?: 'user' . $user->id;
            $username = $base;
            if (in_array($username, $used)) {
                $username = $base . $user->id;
            }
            $used[] = $username;
            DB::table('users')->where('id', $user->id)->update(['username' => $username]);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->unique('username');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn('username');
        });
    }
};
