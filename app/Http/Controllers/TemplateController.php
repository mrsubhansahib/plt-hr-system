<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::latest()->get();
        return view('pages.template.list', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $content = $request->content;

        $template = new Template();
        $template->title = $request->title;
        $template->content = $content;

        // Dynamically set the flags based on the presence of placeholders
        $template->personal_info = $this->hasPlaceholder($content, [
            '{{ $user-',
        ]);

        $template->job_info = $this->hasPlaceholder($content, [
            '{{ $job-',
        ]);

        $template->disclosure_info = $this->hasPlaceholder($content, [
            '{{ $disclosure-',
        ]);

        $template->sickness_info = $this->hasPlaceholder($content, [
            '{{ $sickness-',
        ]);

        $template->capability_info = $this->hasPlaceholder($content, [
            '{{ $capability-',
        ]);

        $template->disciplinary_info = $this->hasPlaceholder($content, [
            '{{ $disciplinary-',
        ]);

        $template->lateness_info = $this->hasPlaceholder($content, [
            '{{ $lateness-',
        ]);

        $template->training_info = $this->hasPlaceholder($content, [
            '{{ $training-',
        ]);
        $template->save();

        return redirect()->route('show.templates')->with('success', 'Template created successfully.');
    }

    // Helper function
    private function hasPlaceholder($content, array $placeholders)
    {
        foreach ($placeholders as $placeholder) {
            if (strpos($content, $placeholder) !== false) {
                return true;
            }
        }
        return false;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        // Check if the template exists
        // dd($template);
        return view('pages.template.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $template->title = $request->title;
        $template->content = $request->content;
        $content = $request->content;

        $template->personal_info = $this->hasPlaceholder($content, [
            '{{ $user-',
        ]);

        $template->job_info = $this->hasPlaceholder($content, [
            '{{ $job-',
        ]);

        $template->disclosure_info = $this->hasPlaceholder($content, [
            '{{ $disclosure',
        ]);

        $template->sickness_info = $this->hasPlaceholder($content, [
            '{{ $sickness',
        ]);

        $template->capability_info = $this->hasPlaceholder($content, [
            '{{ $capability',
        ]);

        $template->disciplinary_info = $this->hasPlaceholder($content, [
            '{{ $disciplinary',
        ]);

        $template->lateness_info = $this->hasPlaceholder($content, [
            '{{ $lateness',
        ]);

        $template->training_info = $this->hasPlaceholder($content, [
            '{{ $training',
        ]);
        $template->save();
        return redirect()->route('show.templates')->with('success', 'Template updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {

        // Check if the template exists

        // Delete the template
        $template->delete();
        return redirect()->route('show.templates')->with('success', 'Template deleted successfully.');
    }
}
