<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Calls seeders specified in list.
 *
 * Names of data files must exactly match the names of tables.
 * The leading line of each data file must be a header.
 * Names of colums in data file must exactly match colums in database
 * table.
 */
class PrijavaSrednjaSolaSeeder extends Seeder
{
    /**
     * Initialize the DatabaseSeeder object.
     * Creates class variable `seeder_list` with names of classes of seeders.
     *
     * @return void
     */

    /**
     * Calls seeders in order specified in `seeder_list`.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prijava_srednjesolska_izobrazba')->truncate();

        DB::table('prijava_srednjesolska_izobrazba')->insert([
            'id_kandidata' => '1',
            'ima_spricevalo' => '1',
            'id_nacina_zakljucka' => '2',
            'id_srednje_sole' => 31104,
            'id_drzave' => 705,
            'sifra_maturitetnega_predmeta' => 0,
            'datum_izdaje_spricevala' => '2016-05-13'
        ]);

        DB::table('prijava_srednjesolska_izobrazba')->insert([
            'id_kandidata' => '5',
            'ima_spricevalo' => '1',
            'id_nacina_zakljucka' => '2',
            'id_srednje_sole' => 31104,
            'id_drzave' => 705,
            'sifra_maturitetnega_predmeta' => 0,
            'datum_izdaje_spricevala' => '2016-05-13'
        ]);

        DB::table('prijava_srednjesolska_izobrazba')->insert([
            'id_kandidata' => '6',
            'ima_spricevalo' => '1',
            'id_nacina_zakljucka' => '2',
            'id_srednje_sole' => 31104,
            'id_drzave' => 705,
            'sifra_maturitetnega_predmeta' => 0,
            'datum_izdaje_spricevala' => '2016-05-13'
        ]);

        DB::table('prijava_srednjesolska_izobrazba')->insert([
            'id_kandidata' => '7',
            'ima_spricevalo' => '1',
            'id_nacina_zakljucka' => '2',
            'id_srednje_sole' => 31104,
            'id_drzave' => 705,
            'sifra_maturitetnega_predmeta' => 0,
            'datum_izdaje_spricevala' => '2016-05-13'
        ]);

        DB::table('prijava_srednjesolska_izobrazba')->insert([
            'id_kandidata' => '8',
            'ima_spricevalo' => '1',
            'id_nacina_zakljucka' => '2',
            'id_srednje_sole' => 31104,
            'id_drzave' => 705,
            'sifra_maturitetnega_predmeta' => 0,
            'datum_izdaje_spricevala' => '2016-05-13'
        ]);

        DB::table('prijava_srednjesolska_izobrazba')->insert([
            'id_kandidata' => '9',
            'ima_spricevalo' => '1',
            'id_nacina_zakljucka' => '2',
            'id_srednje_sole' => 31104,
            'id_drzave' => 705,
            'sifra_maturitetnega_predmeta' => 0,
            'datum_izdaje_spricevala' => '2016-05-13'
        ]);

    }
}

