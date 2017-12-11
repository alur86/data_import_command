<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Shop;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:import data {csv}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import data from cvs file to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        


       $csv = $this->argument('csv');
       
      


        try {


     if (($handle = fopen ( public_path () . $csv, 'r' )) !== FALSE) {
        while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
            $csv_data = new Shop ();
            $csv_data->regionId = $data [0];
            $csv_data->title = $data [1];
            $csv_data->city = $data [2];
            $csv_data->addr= $data [3];
            $csv_data->userId = $data [4];
            $csv_data->save ();
        }

        fclose ($handle);
    }


        } catch (\Exception $ex) {

            $this->line("Failed to import data to database; " . $ex->getMessage());
            return;

        }


 $data = array(
            'info' =>'File '.$csv. 'was imported ok',
       );

        Mail::send('emails.dataimport', $data, function ($message) {

           $message->from('noreply@mysite.com', 'System');

        $message->to('admin@mysite.com')->subject('Data import was done');

    });


        $this->line("File".$csv." was imported onto database ");

   

    }


}


