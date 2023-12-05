@extends("layout")
@section("title", "Login Page")
@section("content")
<div class="container">
<div class="mt-5">
    @if ($errors->any())
      <div class="col-12">
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
        @endforeach
      </div>
    @endif

    @if (session()->has('error'))
      <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if (session()->has('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    @endif
  </div>
<form action="{{route('user.login')}}" method="post" style="width:400px;" class="ms-auto mt-auto me-auto">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
@endsection