@extends('dashboard')

@section('content')
    <main class="signup-form "style="background-color: #f4f4f9; min-height: 100vh; ">
        <div class="cotainer pt-4">
            <div class="row justify-content-center">
                <div class="col-md-4 ">
                    <div class="card">
                        <h3 class="text-center pt-3">Cập nhật</h3>
                        <div class="card-body">
                            <form action="{{ route('user.postUpdateUser') }}" method="POST">
                                @csrf
                                <input name="id" type="hidden" value="{{$user->id}}">
                               <div class="form-group mb-3 text-center">
                                     <label for="username" class="form-label">UserName</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                           value="{{ $user->name }}"
                                           required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                 <div class="form-group mb-3 text-center">
                                     <label for="username" class="form-label">Phone</label>
                                    <input type="text" id="phone" class="form-control" name="phone"
                                           value="{{ $user->phone }}"
                                           required autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                 <div class="form-group mb-3 text-center">
                                     <label for="username" class="form-label">Address</label>
                                    <input type="text" id="address" class="form-control" name="address"
                                           value="{{ $user->address }}"
                                           required autofocus>
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                              <div class="form-group mb-3 text-center">
                                     <label for="username" class="form-label">Email</label>
                                    <input type="text" id="email_address" class="form-control"
                                           value="{{ $user->email }}"
                                           name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 text-center">
                                     <label for="username" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection 