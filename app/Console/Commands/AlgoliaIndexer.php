<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Contracts\Search;

class AlgoliaIndexer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookreview:index {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle(Search $search)
    {
        //fetch all book
        $table  =   $this->argument('table');

        $collection =   collect(
            \DB::table($table)->get()
        )->map(function($item){
            $item->objectID =   $item->id;
            return (array) $item;
        });

//        $books=Book::all()->map(function($book){
//            $book->objectID =   $book->id;
//            return $book;
//        });

        //save object
        $search->index($table)->saveObjects($collection);
        //$search->index('posts')->saveObjects($books);

        //completion message
        $this->info('All Done');
    }
}
