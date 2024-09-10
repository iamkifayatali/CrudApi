<?php

namespace App\Http\Controllers;
use App\Models\Post; 
use Illuminate\Http\Request;
use Illuminate\Http\Response; // Import the Response class
class apicontroller extends Controller
{
    //get data
    public function index()
    {
        $posts = Post::all(); // Retrieve all posts from the database
        return response()->json($posts, Response::HTTP_OK); // Return the data as JSON
    }

    //post
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new Post instance with the validated data
        $post = new Post([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        $post->save(); // Save the new post to the database

        return response()->json($post, Response::HTTP_CREATED); // Return the new post as JSON
    }

    //delete
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], Response::HTTP_NOT_FOUND);
        }

        $post->delete();
        return response()->json(['message' => 'Post deleted'], Response::HTTP_OK);
    }
 
}
