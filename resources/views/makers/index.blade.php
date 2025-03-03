@extends('layout')
 
@section('content')
<h1>Gyártók</h1>
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    @include('success')
    <ul>
        <table>
        <a href="{{ route(name: 'makers.create') }}" title="Új">Új hozzáadása</a>
        <li class="row">
            <div class="col id">#</div>
            <div class="col">Megnevezés</div>
            <div class="right">Műveletek</div>
        </li>
        @foreach($makers as $maker)
            <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                <div class="col id">{{ $maker->id }}</div>
                <div class="col">{{$maker->name}}</div>
                <div class="right">
                    <div class="col">
                      <a href="{{ route('makers.show', $maker->id) }}"><button>Logo</button></a></div>
                       
                    </div>
 
                    
                        <div class="col">
                            <a href="{{ route('makers.edit', $maker->id) }}"><button>Módosít</button></a>
                        </div>
                        <div class="col">
                            <form action="{{ route('makers.destroy', $maker->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn-del-maker">Törlés</button>
                            </form>
                        </div>
                    
                </div>
 
            </li>
        @endforeach
        </table>
    </ul>
    @isset($abc)
        <div class="paginator">
            {{ $makers
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