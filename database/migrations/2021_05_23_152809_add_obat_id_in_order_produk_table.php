<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObatIdInOrderProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_produk', function (Blueprint $table) {
            $table->foreignId('obat_id')->nullable()->constrained('obat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_produk', function (Blueprint $table) {
            $table->dropForeign(['obat_id']);
            $table->dropColumn('obat_id');
        });
    }
}
