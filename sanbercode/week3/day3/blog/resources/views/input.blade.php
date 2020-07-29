@extends('master.blank')
@section('mat')
<div class="card jumbotron">
    <form action="/siswa" method="POST">
    @csrf
        <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">name</label>
        <input type="text" name="name" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword4">kelas</label>
        <input type="text" name="kelas" class="form-control" id="inputPassword4">
    </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">jurusan</label>
      <input type="text" name="jurusan" class="form-control" id="inputEmail4">
    </div>
        <label class="form-check-label" for="gridCheck">Check me out</label>
      </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
 </div>
@endsection
