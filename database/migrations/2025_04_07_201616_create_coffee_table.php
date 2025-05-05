    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('coffee', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string("name");
                $table->string("seal");
                $table->unsignedBigInteger('fornecedores_id');
                $table->foreign('fornecedores_id')->references('id')->on('fornecedores')->onDelete('cascade');
                $table->string("barcode")->unique();
                $table->decimal("price", 8, 2);
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('coffee');
        }
    };