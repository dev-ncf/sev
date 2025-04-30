<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //

     public function store(Request $request)
    {
       $request->validate([
            'files.*' => 'required|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048'
        ]);


        $uploadedFiles = [];


if ($request->hasFile('files')) {
    foreach ($request->file('files') as $file) {
        // Salva o arquivo no diretório "storage/app/public/uploads"
        $path = $file->store('uploads', 'public');

        // Obtém apenas o nome e a extensão
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        // Salva o nome e a extensão no array
        $uploadedFiles[] = "$filename.$extension";
        // $uploadedFiles[] = $path;
    }
}

        return  $uploadedFiles;
    }
}
