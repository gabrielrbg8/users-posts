<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostFile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        if(!empty($post)){
            return view('posts.index', [
                'posts' => $post
            ]);
        }

        return view('posts.index', [
            'posts' => []
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $data = $request->except(['_token', 'files']);
        $data['author'] = Auth::id();

        try {
            if ($post = Post::create($data)) {
                if (isset($request->allFiles()['files'])) {
                    if ($this->upload($post->id,  $request->allFiles()['files']));
                }
                echo json_encode([
                    "status_code" => 200,
                    "message" => 'Post criado com sucesso!'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                "status_code" => 400,
                "message" => 'Falha ao criar post! Verifique se você preencheu todos os campos corretamente.'
            ]);
        }
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function upload($post, $files)
    {
        for ($i = 0; $i < count($files); $i++) {
            $postFile = new PostFile();
            $postFile->post = $post;
            $postFile->path = $files[$i]->store('posts/' . $post);
            $postFile->save();
            unset($postFile);
        }
    }

    public function downloadArchives(Request $request)
    {
        $postFiles = PostFile::where('post', '=', $request->get('id'))->get();
        foreach ($postFiles as $k => $p) {
           return Storage::download($p->path);
        }

    }

    public function getTotal()
    {
        $posts = Post::all();
        return response()->json([
            'total' => count($posts)
        ]);
    }
}
