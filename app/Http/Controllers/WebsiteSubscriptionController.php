<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriberResource;
use App\Http\Resources\SubscriptionsResource;
use App\Models\Subscriptions;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function back;
use function dd;
use function response;

class WebsiteSubscriptionController extends Controller
{
    public function __invoke(Request $request, Website $website)
    {
        $validator = Validator::make($request->all(), [
                'subscriber' => ['required', 'exists:subscribers,id'],
        ]);

        $validator->after(function ($validator) use ($request, $website) {

            $isSubscribed = Subscriptions::where('website_id', $website->id)
                    ->where('subscriber_id', $request->subscriber)
                    ->exists();

            if ($isSubscribed) {
                $validator->errors()->add(
                        'is_subscribed', 'This user is already subscribed to this website.'
                );
            }

        });

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $subscriptions = new Subscriptions();
        $subscriptions->website_id = $website->id;
        $subscriptions->subscriber_id = $request->subscriber;
        $subscriptions->save();

        return response()->json(new SubscriptionsResource($subscriptions));
    }
}