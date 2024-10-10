<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        $type = DocumentType::where('slug', $type)->firstOrFail();

        $documents = $type->documents()->orderBy('id', 'desc')->paginate(10);

        return view('document.index', compact('type', 'documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
    {
        $type = DocumentType::where('slug', $type)->firstOrFail();

        return view('document.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $type)
    {
        $document_type = DocumentType::where('slug', $type)->firstOrFail();

        $validated = $request->validate([
            'title' => 'required',
            'document_number' => 'required',
        ]);

        $validated['document_type_id'] = $document_type->id;
        $validated['user_id'] = auth()->id(); 

        Document::create($validated);
        
        return redirect()->route('document.index', ['type' => $document_type->slug])->with('alert-success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($type, Document $document)
    {
        $type = DocumentType::where('slug', $type)->firstOrFail(); 
        return view('document.edit', compact('document', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $type, Document $document)
    {
        $document_type = DocumentType::where('slug', $type)->firstOrFail();
        $validated = $request->validate([
            'title' => 'required',
            'document_number' => 'required',
        ]);
        // $validated['document_type_id'] = $document_type->id;
        // $validated['user_id'] = auth()->id(); 

        $document->update($validated);

        return redirect()->route('document.index', ['type'=>$document_type->slug])->with('alert-success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type, Document $document)
    {
        $document_type = DocumentType::where('slug', $type)->firstOrFail();
        $document->delete();

        return redirect()->route('document.index', ['type'=>$document_type->slug])->with('alert-success', 'Deleted Successfully');
    }
}
