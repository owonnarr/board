<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['title', 'description'];

    public function getItemsPagination()
    {
        $items = Item::paginate(5);

        if (!empty($items)) {
            return $items;
        }


    }
}
