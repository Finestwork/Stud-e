@if(Session::get('ErrorRegistration'))
    <p class="flash--error">{{ Session::get('ErrorRegistration') }}</p>
@endif
