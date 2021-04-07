<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Community App | Login</title>
    <link rel="stylesheet" href="{{ asset('/css/bidasar.css') }}">
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="hidden" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="email" name="email" class="input">
                            @error('email')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="password" class="input" data-type="password">
                            @error('password')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="group">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" style="color: #fff" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</body>

</html>
