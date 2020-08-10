<?php

namespace App\Http\Controllers;

use App\Navigation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class NavigationController extends Controller
{
    public function table()
    {
        $navigations = Navigation::whereNotNull('url')->get();
        return view('navigation.table', compact('navigations'));
    }

    public function create()
    {
        $navigation = new Navigation;
        $permissions = Permission::get();
        $navigations = Navigation::where('url', null)->get();
        $submit = 'Create';
        return view('navigation.create', compact('navigation', 'permissions', 'navigations', 'submit'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'permission_name' => 'required',
        ]);

        Navigation::create([
            'name' => request('name'),
            'url' => request('url') ?? null,
            'parent_id' => request('parent_id') ?? null,
            'permission_name' => request('permission_name'),
        ]);

        return back();
    }

    public function edit(Navigation $navigation)
    {
        $submit = 'Update';
        $permissions = Permission::get();
        $navigations = Navigation::where('url', null)->get();
        return view('navigation.edit', compact('navigation', 'navigations', 'permissions', 'submit'));
    }

    public function update(Navigation $navigation)
    {
        $navigation->update([
            'name' => request('name'),
            'url' => request('url') ?? null,
            'parent_id' => request('parent_id') ?? null,
            'permission_name' => request('permission_name'),
        ]);

        return redirect()->route('navigation.table');
    }

    public function destroy(Navigation $navigation)
    {
        $navigation->delete();
        return redirect()->route('navigation.table');
    }
}
