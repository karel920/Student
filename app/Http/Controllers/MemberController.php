<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('member_index');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|min:1',
            'phone_number' => 'required',
            'id_number' => 'required',
            'school' => 'required',
            'unit' => 'required'
        ]);

        $member = Member::create($validated);

        flash(__("成功"))->success();

        return redirect()->back();
    }

    public function list()
    {
        $members = Member::query()->orderBy('id', 'desc')->paginate(20);

        return view('member_list', ['members' => $members]);
    }
}
