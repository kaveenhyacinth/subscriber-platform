<?php

    namespace App\Http\Controllers;

    use App\Models\Website;
    use Illuminate\Http\Request;

    class WebsiteController extends Controller
    {
        // Website CRUD methods has been skipped

        public function subscribe(Request $request, Website $website)
        {
            // Request body should contain user id since we are not using authentication
            $request->merge([
                'user_id' => $request['userId']
            ]);

            $validated = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
            ]);

            // Check if user is already subscribed to the website
            if ($website->subscribers->contains($validated['user_id'])) {
                return response()->json([
                    'message' => 'Already subscribed to \'' . $website->title . '\'',
                ], 400);
            }

            // Attach user to website
            $website->subscribers->attach($validated['user_id']);

            return response()->json([
                'message' => 'Subscribed to \'' . $website->title . '\' successfully',
            ]);
        }
    }
