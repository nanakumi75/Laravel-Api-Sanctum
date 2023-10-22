<!DOCTYPE html>
<html lang="en">
<head>
    <x-header-component/>
</head>
<body>
   <x-navigation-component/>
   <div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center text-primary">Account Edit</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto p-3 bg-light rounded border">
           <div class="my-3">
            @if(Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('fail'))
              <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
           </div>
           <form wire:submit.prevent="SubmitRegisterForm" action="{{ URL::to('/edit') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
             <div class="my-3">
                <label for="name">Full name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control form-control-lg" placeholder="Full name ...">
                </div>
                <div class="my-2">
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             </div>
             <div class="my-3">
                <label for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control form-control-lg" placeholder="Email address...">
                </div>
                <div class="my-2">
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             </div>
             <div class="my-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password...">
                </div>
                <div class="my-2">
                    @error('password')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             </div>
             <div class="my-3">
                <label for="password_confirmation">Password Confirmation</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Password Confirmation...">
                </div>
                <div class="my-2">
                    @error('password_confirmation')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             </div>
             <div class="my-3">
                <input type="submit" value="Submit" class="form-control btn btn-lg btn-primary">
             </div>
           </form>
            
        </div>
    </div>
 </div>
   <x-footer-component/>
</body>
</html>