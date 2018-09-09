<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Requests\ItemValidation;
use App\Helpers\ErrorsHelper;

class ItemController extends Controller
{

    public function index()
    {
        $item = new Item();
        $items = $item->getItemsPagination();

        if ($items) {
            return view('partials.items', [
                'items' => $items,
            ]);
        }
    }

    /**
     * отображение формы (добавление)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('items.add_item');
    }

    /**
     * создание объявлений
     * @param ItemValidation $request
     */
    public function create(ItemValidation $request)
    {
        $aData = $request->validated();

        if ($aData) {
            Item::create($aData);
        } else {
            ErrorsHelper::ERR_VALIDATION;
        }

    }


    public function edit($id)
    {

    }

    public function show()
    {

    }

}
