<?php

namespace App\Http\Controllers\Admincp\Settings;

use App\Http\Controllers\Controller;
use App\Models\Admincp\AdminLogs;
use App\Models\Admincp\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    /**
     * Show the lenders index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admincp.settings.index')->with([
            'name' => Settings::where('name', 'name')->first(),
            'lang' => Settings::where('name', 'lang')->get(),
            'sitemap' => Settings::where('name', 'sitemap')->first(),
            'head_code' => Settings::where('name', 'head_code')->first(),
            'country_code' => Settings::where('name', 'country_code')->first(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'lang' => 'required',
            'sitemap' => 'required',
            'country_code' => 'required',
        ]);

        $this->updateName($data['name']);
        $this->updateSitemap($data['sitemap']);
        $this->updateLang($data['lang']);
        $this->updateCountryCode($data['country_code']);

        if ($request->head_code) {
            $this->updateHeadCode($request->head_code);
        }

        if ($request->logo) {
            $this->updateLogo($request->file('logo'));
        }

        if (Auth()->user()) {
            AdminLogs::create(['user_id' => Auth()->id(), 'log' => 'Updated settings']);
        }

        return redirect()->back()->with('success', 'Settings has been updated!');
    }

    public function updateName($name)
    {
        $settings = Settings::where('name', 'name')->first();

        if ($settings) {
            $settings->update([
                'value' => $name,
            ]);
        } else {
            Settings::create([
                'name' => 'name',
                'value' => $name,
            ]);
        }

        return true;
    }

    public function updateCountryCode($cc)
    {
        $settings = Settings::where('name', 'country_code')->first();

        if ($settings) {
            $settings->update([
                'value' => $cc,
            ]);
        } else {
            Settings::create([
                'name' => 'country_code',
                'value' => $cc,
            ]);
        }

        return true;
    }

    public function updateHeadCode($code)
    {
        $settings = Settings::where('name', 'head_code')->first();

        if ($settings) {
            $settings->update([
                'value' => $code,
            ]);
        } else {
            Settings::create([
                'name' => 'head_code',
                'value' => $code,
            ]);
        }

        return true;
    }

    public function updateSitemap($name)
    {
        $settings = Settings::where('name', 'sitemap')->first();

        if ($settings) {
            $settings->update([
                'value' => $name,
            ]);
        } else {
            Settings::create([
                'name' => 'sitemap',
                'value' => $name,
            ]);
        }

        return true;
    }

    public function updateLogo($image)
    {
        $logo = Settings::where('name', 'logo')->first();

        $path = Storage::putFile('public/images/', $image);
        $path = explode('public/', $path);

        $fullpath = '/storage/' . $path[1];

        if ($logo) {
            $logo->update([
                'value' => $fullpath,
            ]);
        } else {
            Settings::create([
                'name' => 'logo',
                'value' => $fullpath,
            ]);
        }

        return true;
    }

    public function updateLang($langs)
    {
        Settings::where('name', 'lang')->delete();

        foreach ($langs as $lang) {
            Settings::create([
                'name' => 'lang',
                'value' => $lang,
            ]);
        }

        return true;
    }
}
