@extends('layouts.app')

@section('content')
<div class="container">
    <div >

        @foreach ($users->roles as $item )

<a href="{{url($item->name)}}">
<div class="card badge-primary">
  <div class="card-header">
    <h3 class="card-title"> {{$item->name}}</h3>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="badge"> Cargo </span>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->

</div>
</a>
<p></p>

@endforeach
    </div>
</div>
@endsection
