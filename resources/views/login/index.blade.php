@extends("layout.nonav")

@section("container")

  
<main class="form-signin w-100 m-auto">

  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session('success')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session()->has('errorMsg'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('errorMsg')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

<form method="post">
  <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

  @csrf

  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
    <label for="floatingInput">Email</label>
  </div>
  <div class="form-floating mb-3">
    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
    <label for="floatingPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me" onclick="showPassword()"> show password
    </label>
  </div>
  <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
  <label class="mt-2">
    Have no account? <a href="/register">create one</a>
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