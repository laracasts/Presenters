<?php namespace Acme\Presenters;

use Illuminate\Database\Eloquent\Collection;

class PresenterCollection extends Illuminate\Support\Collection {
	
    public function __construct($presenter, Collection $collection)
    {
        foreach($collection as $key => $resource)
        {
            $collection->put($key, new $presenter($resource));
        }

        $this->items = $collection->toArray();
    }
    
}
