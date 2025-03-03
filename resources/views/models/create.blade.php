@extends('layout')

	<main>
        	@yield('content')
    	</main>

	
@section('content')
<h1>Új karosszéria</h1>
<div>


<form action="{{ route('models.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <label for="name">Megnevezés</label>
            <input type="text" id="name" name="name">
        </fieldset>
        <button type="submit">Ment</button>
        <a href="{{ route('models.index') }}">Mégse</a>
    </form>
</div>
@endsection