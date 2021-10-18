<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use function response;

class SubscriberController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request, Subscriber $subscriber)
    {
        $this->validate($request,[
                'email' => ['required','unique:subscribers,email']
        ]);

        $subscriber->email = $request->email;
        $subscriber->save();

        return response()->json(new SubscriberResource($subscriber),201);
    }



    public function show(Subscriber $subscriber)
    {
        //
    }


    public function edit(Subscriber $subscriber)
    {
        //
    }


    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }


    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
