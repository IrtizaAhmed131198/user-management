@extends('layouts.app')

@section('css')
<style>
@media (min-width: 768px) {
    #page-wrapper {
        margin-left: unset !important;
    }
}
</style>
@endsection

@section('content')
<h1 class="text-center">User Management</h1>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <fieldset>
                            <!-- Show errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <input
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="E-mail"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    autofocus
                                >
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password"
                                    name="password"
                                    type="password"
                                >
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me" {{ old('remember') ? 'checked' : '' }}>Remember Me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
