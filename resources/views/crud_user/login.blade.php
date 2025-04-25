@extends('dashboard')

@section('content')
    <main class="login-form " style="background-color: #f4f4f9; min-height: 100vh; ">
        <div class="cotainer pt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="text-center pt-5 pb-3">Đăng nhập</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.authUser') }}">
                                @csrf
                                <div class="form-group mb-3 text-center">
                                     <label for="name" class="form-label">UserName</label>
                                    <input type="text" id="name" class="form-control" name="name" required
                                           autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 text-center">
                                     <label for="username" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <!-- <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div> -->
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Signin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection