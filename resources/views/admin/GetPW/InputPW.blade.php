<form method="POST">
        @csrf
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="admin_password">
        {{-- @if ($errors->has('admin_password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('admin_password')}}</strong>
            </span>
        @endif --}}
        <span class="focus-input100"></span>
    {{-- <label>Confirm Password</label>
        <div>
            <input type="password" value="admin_passwor">
        </div> --}}
        <input type="submit" value="Submit">
</form>
