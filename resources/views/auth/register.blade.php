@extends('app')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="text-center">
                <main class="form-signin">
                    <form method="post">
                        @csrf()
                        <div class="form-floating">
                            <input class="form-control" id="floatingInput" name="username" value="{{old('username')}}">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="floatingInput" name="first_name" value="{{old('first_name')}}">
                            <label for="floatingInput">First Name</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="floatingInput" name="last_name" value="{{old('last_name')}}">
                            <label for="floatingInput">Last Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif
                        <button class=" btn btn-lg btn-primary" type="submit">Save</button>
                    </form>
                </main>
            </div>
        </div>
    </div>

@endsection
