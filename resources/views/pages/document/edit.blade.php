@extends('layout.master')
@push('plugin-styles')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
@endpush
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Document</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Document Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.document', $document->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 mt-3">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input class="form-control" required type="text" name="title"
                                    value="{{ $document->title }}" />
                            </div>

                            <div class="col-12 mt-3">
                                <label class="form-label">Content<span class="text-danger">*</span></label>
                                <textarea class="form-control" required id="contentEditor" name="content" rows="10">{{ $document->content }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Remove the click event listener for the button since it's now a submit button
            const form = document.querySelector('#form');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                // alert('Form submitted!');
                const contentEditor = CKEDITOR.instances.contentEditor;
                if (contentEditor) {
                    const content = contentEditor.getData();
                    // Replace &gt; with >
                    const updatedContent = content.replace(/&gt;/g, '>');
                    contentEditor.setData(updatedContent);
                    form.submit();
                }
            });
        });
    </script>
@endsection


@push('custom-scripts')
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace('contentEditor', {
                    height: 700,
                    toolbar: [{
                            name: 'clipboard',
                            items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo']
                        },
                        {
                            name: 'find',
                            items: ['Find', 'Replace', 'SelectAll']
                        },
                        {
                            name: 'basicstyles',
                            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript',
                                'RemoveFormat'
                            ]
                        },
                        {
                            name: 'paragraph',
                            items: ['NumberedList', 'BulletedList', 'Blockquote', 'Indent', 'Outdent']
                        },
                        {
                            name: 'align',
                            items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                        },
                        {
                            name: 'styles',
                            items: ['Styles', 'Format', 'Font', 'FontSize']
                        },
                        {
                            name: 'insert',
                            items: ['HorizontalRule']
                        }, 

                        {
                            name: 'colors',
                            items: ['TextColor']
                        },

                    ]
                });

                // Insert merge fields
                CKEDITOR.instances.contentEditor.on('instanceReady', function() {
                    const addButton = document.querySelector('#add_field_button');
                    const mergerFieldSelect = document.querySelector('#mergerFieldSelect');

                    if (addButton && mergerFieldSelect) {
                        addButton.addEventListener('click', function() {
                            const selectedField = mergerFieldSelect.value;
                            if (selectedField) {
                                CKEDITOR.instances.contentEditor.insertText(' {' + selectedField +
                                    '} ');
                                mergerFieldSelect.selectedIndex = 0;
                            }
                        });
                    }
                });
            } else {
                console.error('CKEditor not loaded.');
            }
        });
    </script>
@endpush
