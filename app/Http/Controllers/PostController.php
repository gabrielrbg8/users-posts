<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostFile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if($request->user()->can('viewAny', Auth::user())){
            $post = Post::all();
        } else{
            $post = Post::where('author', '=', Auth::user()->id)->get();
        }
        if (!empty($post)) {
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

    public function show(Post $post, Request $request)
    {
        if($request->user()->cannot('view', $post)){
            abort(403);
        }
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function destroy(Post $post, Request $request){
        if($request->user()->cannot('delete', $post)){
            abort(403);
        }

        echo 'Em construção...';
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
        try {
            $zip = new ZipArchive();
            $zip_file = 'download.zip';
            $zip->open($zip_file, ZipArchive::CREATE);

            $path = storage_path('app/public/posts/'.$request->get('id'));

            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($path),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );
            foreach ($files as $k => $file) {
                $filePath = $file->getRealPath();
                if (file_exists($filePath) && is_file($filePath)){
                    $relativePath = 'users-posts/' . substr($filePath, strlen($path) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();
        } catch (Exception $e) {
            throw ($e);
        }

        return response()->download($zip_file)->deleteFileAfterSend(true);

    }

    public function getTotal(Request $request)
    {
        $posts = Post::all();
        return response()->json([
            'total' => count($posts)
        ]);
    }
}
