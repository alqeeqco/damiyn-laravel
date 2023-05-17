@if(Session::has('success'))
{{-- <div class="alert alert-success" role="alert">
    {{  Session::get('success') }}
  </div> --}}
  <div class="alert alert-success" role="alert">
    <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
        <span aria-hidden="true">×</span>
    </button>
    <strong>success</strong> {{  Session::get('success') }}

</div>
  @endif
