@extends('partials.base')

@section('body-content')
<div class="container">
    <form action="{{ route('signin') }}" method="POST">
        <div class="form-group">
            <label for="email">Enter your email: </label>
            <input type="email" id="emailTxt" name="email">
        </div>
        <div class="form-group">
            <label for="password">Enter your Password: </label>
            <input type="password" id="passwordTxt" name="password">
        </div>
    </form>
</div>
@endsection
