@extends('layout')
 
@section('content')
<h1>Karosszériák</h1>
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
 
    <ul>
        <table>
        <a href="{{ route(name: 'bodies.create') }}" title="Új">Új hozzáadása</a>
        @foreach($bodies as $body)
            <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                <div class="col id">{{ $body->id }}</div>
                <div class="col">{{$body->name}}</div>
                <div class="right">
                    <div class="col">
{{--                        <a href="{{ route('bodies.show', $body->id) }}"><button><i class="fa fa-binoculars" title="Mutat"></i></button></a></div>--}}
                       
                    </div>
 
                   
                        <div class="col">
                            <a href="{{ route('bodies.edit', $body->id) }}"><button>Módosít</button></a>
                        </div>
                        <div class="col">
                            <form action="{{ route('bodies.destroy', $body->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn-del-body">Töröl</button>
                            </form>
                        </div>
                   
                </div>
 
            </li>
        @endforeach
        </table>
    </ul>
    @isset($abc)
        <div class="paginator">
            {{ $bodies
                ->appends([
                    'sort_by' => request('sort_by'),
                    'sort_dir' => request('sort_dir'),
                ])
                ->links()
 
            }}
        </div>
    @endisset
</div>
@endsection