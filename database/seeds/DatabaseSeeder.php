<?php


use database\seeds\KriterijSeeder;
use database\seeds\VpisniPogojSeeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

include 'UporabnikSeeder.php';
include 'PrijavniRokSeeder.php';
include 'PrijavaSeeder.php';
include 'MaturaSeeder.php';
include 'PoklicnaMaturaSeeder.php';
include 'PoklicnaMaturaPredmetSeeder.php';
include 'MaturaPredmetSeeder.php';
include 'PrijavaSrednjaSolaSeeder.php';
include 'NaslovZaPosiljanjeSeeder.php';
include 'SteviloVpisnihMestSeeder.php';
include 'PrijavaOsebniPodatkiSeeder.php';

/**
 * Calls seeders specified in list.
 *
 * Names of data files must exactly match the names of tables.
 * The leading line of each data file must be a header.
 * Names of colums in data file must exactly match colums in database
 * table.
 */
class DatabaseSeeder extends CsvSeeder
{
    /**
     * Initialize the DatabaseSeeder object.
     * Creates class variable `seeder_list` with names of classes of seeders.
     *
     * @return void
     */
     public function __construct()
     {
         $this->seeder_list = array(DrzavljanstvoSeeder::class,
             DrzavaSeeder::class, ElementSeeder::class, 
             KoncanaSrednjaSolaSeeder::class, 
             ObcinaSeeder::class, PoklicSeeder::class, PostaSeeder::class,
             SrednjaSolaSeeder::class, StudijskiProgramSeeder::class,
             VpisniPogojSeeder::class, KriterijSeeder::class,
             VisokosolskiZavodSeeder::class, PrijavaSeeder::class, PoklicnaMaturaSeeder::class,
             PoklicnaMaturaPredmetSeeder::class, MaturaPredmetSeeder::class,
             MaturaSeeder::class, PrijavaSrednjaSolaSeeder::class,
             NaslovZaPosiljanjeSeeder::class

             );
     }

    /**
     * Calls seeders in order specified in `seeder_list`.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
		Eloquent::unguard();
        DB::table('prijava_naslov_za_posiljanje')->truncate();
        DB::table('prijava_osebni_podatki')->truncate();
        DB::table('prijava_stalno_prebivalisce')->truncate();
        DB::table('prijava_srednjesolska_izobrazba')->truncate();
        $this->call(UporabnikSeeder::class);
        $this->call(PrijavniRokSeeder::class);

        foreach ($this->seeder_list as $seeder) {
            $this->call($seeder);
        }

        $this->call(SteviloVpisnihMestSeeder::class);
        $this->call(PrijavaOsebniPodatkiSeeder::class);

    }
}

