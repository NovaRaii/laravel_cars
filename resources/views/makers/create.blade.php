@extends('layout')

	<main>
        	@yield('content')
    	</main>

	
@section('content')
<h1>Új karosszéria</h1>
<div>
@include('error')

<form action="{{ route('makers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <label for="name">Megnevezés</label>
            <input type="text" id="name" name="name">
            <label for="logo">Logó</label>
            <input type="file" id="logo" name="logo">
        </fieldset>
        <button type="submit">Ment</button>
        <a href="{{ route('makers.index') }}">Mégse</a>
    </form>
</div>
@endsection