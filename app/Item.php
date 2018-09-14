<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['title', 'description', 'user_id'];

    /**
     * @return mixed
     */
    public function getItemsPagination()
    {
        $items = Item::paginate(5);

        if (!empty($items)) {
            return $items;
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
