<?php

namespace App\Http\Controllers;

use App\Document;
use App\Template;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::with('template', 'user')->latest()->get();
        return view('pages.document.list', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = Template::all();
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view('pages.document.create', compact('templates', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'template_id' => 'required|exists:templates,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $template = Template::find($request->template_id);
        $content = Blade::render($template->content, [
            'user' => User::find($request->user_id),
        ]);
        // dd($content);
        Document::create(
            [
                'template_id' => $request->template_id,
                'user_id' => $request->user_id,
                'title' => $request->title,
                'content' => $content,
            ]
        );
        return redirect()->route('show.documents')->with('success', 'Document created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
  
        // Get the template and user associated with the document
        $template = $document->template;
        $user = $document->user;

        return view('pages.document.show', compact('document', 'template', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('pages.document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $document->update($request->all());
        return redirect()->route('show.documents')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
    public function getEmployeeData($id)
    {
    
        $user = User::with('jobs')->find($id);
        return response()->json([
            'jobs'=> $user->jobs,
        ]);
    }
}
