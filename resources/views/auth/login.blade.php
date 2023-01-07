@extends('app')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="text-center">
                <main class="form-signin">
                    <form method="post">
                        @csrf()
                        <div class="form-floating">
                            <input class="form-control" id="floatingInput" name="username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class=" btn btn-lg btn-primary" type="submit">Sign in</button>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    </form>
                </main>
            </div>
        </div>
    </div>

@endsection
