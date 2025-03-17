<?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use Illuminate\Http\Request;

    class PostController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         */
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
                'message' => 'Post created successfully',
            ]);
        }

        /**
         * Display the specified resource.
         */
        public function show(Post $post)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Post $post)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Post $post)
        {
            //
        }
    }
