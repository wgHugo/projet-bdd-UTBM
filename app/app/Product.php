<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Product extends Model implements Searchable
{
    protected $table = 'products';
    protected $fillable = ['name', 'author', 'description', 'url_img', 'type_id', 'category_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('product.card', $this->id);
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
