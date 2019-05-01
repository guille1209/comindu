<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCominduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing grupo_platos
        Schema::create('grupo_platos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });


        // Create table for storing grupo_alimentos
        Schema::create('grupo_alimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Create table for storing unidades
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc_corta')->nullable();
            $table->string('desc_larga')->nullable();
            $table->timestamps();
        });

        // Create table for storing alimentos
        Schema::create('alimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('grupo_alimento_id')->unsigned();
            $table->integer('unidad_id')->unsigned();
            $table->timestamps();
            $table->foreign('grupo_alimento_id')
                  ->references('id')
                  ->on('grupo_alimentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('unidad_id')
                  ->references('id')
                  ->on('unidades')->onUpdate('cascade')->onDelete('cascade');
         });  

        // Schema::table('alimentos', function($table) {
        //      $table->foreign('grupo_alimento_id')->references('id')->on('grupo_alimentos')->onUpdate('cascade')->onDelete('cascade');
        //      $table->foreign('unidad_id')
        //            ->references('id')
        //            ->on('unidades')->onUpdate('cascade')->onDelete('cascade');
        // });
          
        
        // Create table for storing equivalencias
        Schema::create('equivalencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidad_origen_id')->unsigned();
            $table->integer('unidad_destino_id')->unsigned();
            $table->decimal('valor')->nullable();
            $table->timestamps();
            $table->foreign('unidad_origen_id')
                  ->references('id')
                  ->on('unidades');
            $table->foreign('unidad_destino_id')
                  ->references('id')
                  ->on('unidades');       
        });

        // Create table for storing platos
        Schema::create('platos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->nullable();
            $table->integer('grupo_plato_id')->unsigned();            
            $table->timestamps();
            $table->foreign('grupo_plato_id')
                  ->references('id')
                  ->on('grupo_platos')->onUpdate('cascade')->onDelete('cascade');           
        });

        // Create table for storing menus
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->string('descripcion')->nullable();            
            $table->timestamps();                 
        });

        // Create table for associating menus to platos (Many-to-Many)
        Schema::create('menu_plato', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('plato_id')->unsigned();
            $table->integer('dia')->nullable();

            $table->foreign('menu_id')->references('id')->on('menus')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('plato_id')->references('id')->on('platos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['menu_id', 'plato_id', 'dia']);
        });


        // Create table for associating receta (platos to alimentos) (Many-to-Many)
        Schema::create('recetas', function (Blueprint $table) {           
            $table->integer('alimento_id')->unsigned();
            $table->integer('plato_id')->unsigned();            
            $table->decimal('cantidad')->nullable();
            $table->integer('unidad_id')->nullable();
            $table->string('descripcion')->nullable();

            $table->foreign('alimento_id')->references('id')->on('alimentos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('plato_id')->references('id')->on('platos')
                ->onUpdate('cascade')->onDelete('cascade');
            

            $table->primary(['alimento_id','plato_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
      Schema::drop('menu_plato');
      Schema::drop('recetas');
      Schema::drop('platos');
      Schema::drop('menus');
      Schema::drop('grupo_platos');
      Schema::drop('alimentos');
      Schema::drop('grupo_alimentos');
      Schema::drop('equivalencias');      
      Schema::drop('unidades');       
      
       
       
    }
}
