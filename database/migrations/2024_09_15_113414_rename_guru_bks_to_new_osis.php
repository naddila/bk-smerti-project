<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameGuruBksToNewOsis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::rename('guru_bks', 'osis');
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::rename('osis', 'guru_bks');
}

}
