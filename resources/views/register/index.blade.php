@extends("layout.nonav")

@section("container")

  
<main class="form-signin w-100 m-auto">
<form method="post">
  <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>

  @csrf <!--Untuk token-->

  <div class="form-floating">
    <input type="search" class="form-control @error('name') is-invalid @enderror" id="floatingName" name="name" placeholder="Name">
    <label for="floatingInput">Name</label>
    @error('name')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
  </div>
  <div class="form-floating">
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" placeholder="Email">
    <label for="floatingPassword">Email Address</label>
    @error('email')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-floating">
    <input type="search" class="form-control @error('username') is-invalid @enderror" id="floatingUsername" name="username" placeholder="Username">
    <label for="floatingInput">Username</label>
    @error('username')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-floating mb-3">
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
    <label for="floatingPassword">Password</label>
    @error('password')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me" onclick="showPassword()"> show password
    </label>
  </div>
  <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
  <label class="mt-2">
    Already register yet? <a href="/login">login here</a>
  </label>
  <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
</form>
</main>
<script>
    function showPassword(){
        const inType = document.querySelector("#floatingPassword").type
        if(inType === 'text'){
            document.querySelector("#floatingPassword").type = "password"
        }
        else{
            document.querySelector("#floatingPassword").type = "text"
        }
    }
</script>
@endsection