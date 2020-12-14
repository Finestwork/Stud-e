@if(Session::get('error'))
    <p class="flash--error">{{ Session::get('error') }}</p>
@endif
