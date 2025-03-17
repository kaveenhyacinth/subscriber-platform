<?php

    namespace App\Http\Controllers;

    use App\Mail\PostCreated;
    use App\Models\Post;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;

    class PostController extends Controller
    {

        // Other CRUD methods have been skipped


        public function store(Request $request)
        {
            $request->merge([
                'website_id' => $request['websiteId']
            ]);

            $validated = $request->validate([
                'website_id' => 'required|integer|exists:websites,id',
                'title' => 'required|string',
                'slug' => 'required|string',
                'content' => 'required|string',
            ]);

            $post = Post::create($validated);

            if (!$post) {
                return response()->json([
                    'message' => 'Post not created',
                ], 500);
            }

            return response()->json([
                'message' => 'Post created successfully'
            ], 201);
        }
    }
