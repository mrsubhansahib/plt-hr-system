@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
@endif
{{-- 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Record not found</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
</div> --}}