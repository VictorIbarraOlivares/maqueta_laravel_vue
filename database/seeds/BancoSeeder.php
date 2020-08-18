<?php

use App\Banco;
use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banco = new Banco();
        $banco->nombre = 'banco bci';
        $banco->save();

        $banco = new Banco();
        $banco->nombre = 'banco de chile';
        $banco->save();

        $banco = new Banco();
        $banco->nombre = 'scotiabank';
        $banco->save();

        $banco = new Banco();
        $banco->nombre = 'santander';
        $banco->save();

        $banco = new Banco();
        $banco->nombre = 'banco falabella';
        $banco->save();
    }
}
