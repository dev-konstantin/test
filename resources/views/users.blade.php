@extends('app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="te12xt-center">
                <main class="form-signin">
                    <form>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating">
                                    <input class="form-control" id="floatingInput" name="first_name" value="{{old('first_name', request()->first_name)}}">
                                    <label for="floatingInput">First name</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input class="form-control" id="floatingInput" name="last_name" value="{{old('last_name', request()->last_name)}}">
                                    <label for="floatingInput">Last name</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input class="form-control" id="floatingInput" name="username" value="{{old('username', request()->username)}}">
                                    <label for="floatingInput">Username</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                    <form action="{{route('logout')}}" method="post">
                        @csrf()
                        <button class="btn btn-primary" type="submit">logout</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Username</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td scope="col">{{$user->id}}</td>
                <td scope="col">{{$user->first_name}}</td>
                <td scope="col">{{$user->last_name}}</td>
                <td scope="col">{{$user->username}}</td>
                <td>
                    <form class="form_delete" action="{{route('users.destroy', $user->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $(function() {
            $('.form_delete').on('submit', function () {
                let form = $(this);
                $.post(form.attr('action'), form.serialize(), function (json) {
                    if (json.status) {
                        form.parents('tr').remove();
                    } else {
                        alert(json.message);
                    }
                });

                return false;
            });
        });
    </script>
@endsection
