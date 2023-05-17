
@if(Session::has('error'))
{{-- <div class="alert alert-danger" role="alert">

  </div> --}}

  <div class="alert alert-success" role="alert">
    <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
        <span aria-hidden="true">×</span>
    </button>
    <strong>success</strong> {{  Session::get('error') }}

</div>
  @endif
