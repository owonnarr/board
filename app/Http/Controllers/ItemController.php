<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Requests\ItemValidation;
use App\Helpers\ErrorsHelper;
use App\Providers\AuthServiceProvider;
use App\User;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $item = new Item();
        $items = $item->getItemsPagination();

        $userId = false;

        if (Auth::check()) {
            $userId = Auth::user()->id;
        }

        if ($items) {
            return view('partials.items', [
                'items' => $items,
                'userId' => $userId,
            ]);
        }
    }

    /**
     * отображение формы для добавления (если пользователь авторизирован)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        if (Auth::check()) {
            return view('items.add_item');
        } else {
            redirect(route('login'));
        }

    }

    /**
     * @param ItemValidation $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(ItemValidation $request)
    {
        $aData = $request->validated();
        $aData['user_id'] = Auth::user()->id;

        if ($aData) {
            Item::create($aData);
            return redirect(route('home'));
        } else {
            ErrorsHelper::ERR_VALIDATION;
        }

    }

    /**
     * обновление данных объявления
     * @param int $id
     * @param Request $request
     * @param ItemValidation $valid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id, Request $request)
    {
        $item = Item::find($id);

        switch ($request->getMethod()) {

            case 'GET':
                $aData = Item::find($id);

                if ($aData !== null)
                    return view('items.edit', [
                        'item' => $aData,
                    ]);
                break;

            case 'POST':

                $this->validate($request, $rules = [
                    'title' => 'required|max:35',
                    'description' => 'required|max:255',
                ]);
                $aData = $request->all();
                $aData['user_id'] = Auth::user()->id;

                if ($aData) {
                    $item->update($aData);
                    return redirect(route('home'));
                }
        }

    }

    /**
     * страница просмотра объявления
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $item = Item::find($id);
        if ($item !== null) {
            return view('items.view_item', [
                'item' => $item
            ]);
        } else {
            die('Ошибка, объявления с id '. $id .' не существует');
        }

    }

    /**
     * удаление объявления
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(int $id)
    {
        if ($id && Item::find($id) !== null) {
            Item::destroy($id);
            return redirect('/');
        }
    }

}
