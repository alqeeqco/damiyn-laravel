
@if(Session::has('error'))
{{-- <div class="alert alert-danger" role="alert">

  </div> --}}
  <div id="ui_notifIt" class="error" style="width: 400px; opacity: 1; left: 483px; top: 10px;"><p><b>Oops!</b> {{  Session::get('error') }}</p></div>
  @endif
