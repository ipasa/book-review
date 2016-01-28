<?php

namespace App\Services;

use App\Contracts\Search;
use AlgoliaSearch\Client;
use App\Http\Requests\Request;

class AlgoliaSearch implements Search
{
    protected $client;
    protected $index;

    public function __construct(Client $client)
    {
        $this->client   =   $client;
    }
    public function index($index)
    {
        $this->index    =   $this->client->initIndex($index);
        return $this;
    }

    public function get($query)
    {
        return $this->index->search($query)['hits'];
    }

}