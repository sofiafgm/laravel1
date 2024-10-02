<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Member;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        return Member::all();
    }

    public function create(Request $request): View
    {
        return view('member.create');
    }

    public function store(Request $request): RedirectResponse
    {

        Member::create($request->except(['_token', '_method']));

        return Redirect::to('/');
    }

    public function edit(string $id): View
    {
        return view('member.edit', [
            'member' => Member::findOrFail($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        $member = Member::find($id);
        $member->update($request->except(['_token', '_method']));

        return  redirect()->back()->withSuccess('Miembro actualizado exitosamente...');
    }

    public function delete(string $id)
    {
        $member = Member::find($id);
        $member->delete();

        return 'OK';
    }
}
