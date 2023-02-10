<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

use App\Models\User;
use App\Models\Session;
use App\Models\Website;
use App\Models\PageView;

class WebsiteController extends Controller
{
    public function Index()
    {
        return Inertia::render('Website/Index');
    }

    public function create()
    {
        return Inertia::render('Website/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'domain' => 'required',
        ]);

        // get auth user
        $user = auth()->user();

        // website
        $website = new Website;
        $website->name = $request->name;
        $website->domain = $request->domain;
        $website->public = false;
        $website->save();

        // attach user to website
        $user->websites()->attach($website->id, [
            'role' => User::ROLE_OWNER,
        ]);

        return redirect(route('website.show', $website->id));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'domain' => 'required|url',
        ]);

        $website = auth()->user()->currentWebsite;

        $website->name = $request->name;
        $website->domain = $request->domain;
        $website->allowed_domains = $request->allowed_domains;
        $website->public = $request->public;
        $website->save();

        return redirect(route('website.show', $website->id));
    }


}
