<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Dirs;
use Exception;

class FileManagerController extends Controller
{
    protected $dir;
    public function __construct(Dirs $dir)
    {
        $this->dir = $dir;

    }
    public function createDir(Request $request) {
        $name = $request->name;
        $author_id = 1;
        $files_ids = "";
        $status = "";
        $error = "";
        if(Storage::exists($name)) {
            $status = "error";
            $error  = "Папка {$name} уже существует!";
            return response()->json(['status' => $status, 'error' => $error], 400);
        }
        else {
            try {
                Storage::makeDirectory($name);
    
                $currentChamp = new Dirs();
                $currentChamp['name'] = $name;
                $currentChamp['author_id'] = $author_id;
                $currentChamp['files_ids'] = $files_ids;
                $currentChamp->save();
                $status = "success";
            }
            catch(Exception $e) {
                $status = "error";
            }
        }

        return response()->json(['status' => $status], 200);
    }
    public function getAllDir(Request $request) {
        $dirs = $this->dir->all();
        return response()->json(['dirs' => $dirs], 200);
    }
}
