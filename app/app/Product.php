<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Product extends Model implements Searchable
{
    protected $table = 'products';
    protected $fillable = ['name', 'author', 'description', 'url_img', 'type_id', 'category_id'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('product.card', $this->id);
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
    public function type(){
        return $this->belongsTo('App\Category');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }

}
