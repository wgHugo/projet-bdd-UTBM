<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
{
        protected $table = 'categories';
        protected $fillable = ['name', 'type'];

    public function getSearchResult(): SearchResult
    {
        $url = route('category.show', $this->id);
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
