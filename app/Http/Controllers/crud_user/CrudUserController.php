<?php

namespace App\Http\Controllers\crud_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CrudUserController extends Controller
{
    public function listUser(Request $request)
    {
        $search = $request->input('search');
        $searchType = $request->input('search_type', 'name'); // Default to name search
        $query = User::query();

        if ($search) {
            switch ($searchType) {
                case 'id':
                    $query->where('id', '=', $search);
                    break;
                case 'name':
                    $query->where('name', 'like', "%{$search}%");
                    break;
                case 'order':
                    $query->whereHas('orders', function($q) use ($search) {
                        $q->where('order_number', 'like', "%{$search}%");
                    });
                    break;
            }
        }

        $users = $query->paginate(10);
        return view('crud_user.list', compact('users'));
    }
} 