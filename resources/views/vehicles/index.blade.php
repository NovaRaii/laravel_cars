@extends('layout')
 
@section('content')
<h1>Járművek</h1>
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
 
    <ul>
        <table>
        <a href="{{ route(name: 'vehicles.create') }}" title="Új">Új hozzáadása</a>
        @foreach($vehicles as $vehicle)
            <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                <div class="col id">{{ $vehicle->id }}</div>
                <div class="col">{{$vehicle->name}}</div>
                <div class="right">
                    <div class="col">
{{--                        <a href="{{ route('vehicles.show', $vehicle->id) }}"><button><i class="fa fa-binoculars" title="Mutat"></i></button></a></div>--}}
                       
                    </div>
 
                   
                        <div class="col">
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}"><button>Módosít</button></a>
                        </div>
                        <div class="col">
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn-del-vehicle">Töröl</button>
                            </form>
                        </div>
                   
                </div>
 
            </li>
        @endforeach
        </table>
    </ul>
    @isset($abc)
        <div class="paginator">
            {{ $vehicles
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