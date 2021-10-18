<?php

namespace App\Http\Controllers;

use App\Http\Resources\WebsiteResource;
use App\Models\Website;
use Illuminate\Http\Request;
use function response;

class WebsiteController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request, Website $website)
    {
        $validated = $this->validate($request, [
                'url'  => 'url',
                'name' => 'nullable|max:255'
        ]);

        $website->url = $request->url;
        $website->name = $request->name;
        $website->saveOrFail();

        return response()->json(new WebsiteResource($website), 201);
    }


    public function show(Website $website)
    {
        //
    }


    public function edit(Website $website)
    {
        //
    }


    public function update(Request $request, Website $website)
    {
        //
    }


    public function destroy(Website $website)
    {
        //
    }
}
