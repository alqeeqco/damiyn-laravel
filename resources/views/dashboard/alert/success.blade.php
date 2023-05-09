@if(Session::has('success'))
{{-- <div class="alert alert-success" role="alert">
    {{  Session::get('success') }}
  </div> --}}
  <div id="ui_notifIt" class="success" style="width: 400px; opacity: 1; right: 10px;"><p><b>Success:</b> {{  Session::get('success') }}</p></div>

  @endif
