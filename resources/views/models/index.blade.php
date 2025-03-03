@extends('layout')

@section('content')
<h1>Modellek</h1>
<div>
    @include('success')
    
    <form method="GET" action="{{ route('models.index') }}">
        <label for="maker">Válassz egy gyártót:</label>
        <select name="maker_id" id="maker" onchange="this.form.submit()">
            <option value="">Összes</option>
            @foreach($makers as $maker)
                <option value="{{ $maker->id }}" {{ request('maker_id') == $maker->id ? 'selected' : '' }}>
                    {{ $maker->name }}
                </option>
            @endforeach
        </select>
    </form>
    
    <a href="{{ route('models.create') }}" title="Új">Új hozzáadása</a>
    
    <ul>
        <table>
            <li class="row">
                <div class="col id">#</div>
                <div class="col">Megnevezés</div>
                <div class="right">Műveletek</div>
            </li>
            @foreach($models as $model)
                <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                    <div class="col id">{{ $model->id }}</div>
                    <div class="col">{{ $model->name }}</div>
                    <div class="right">
                        <div class="col">
                            <a href="{{ route('models.edit', $model->id) }}"><button>Módosít</button></a>
                        </div>
                        <div class="col">
                            <form action="{{ route('models.destroy', $model->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn-del-model">Törlés</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </table>
    </ul>
    
    @isset($models)
        <div class="paginator">
            {{ $models->appends(['maker_id' => request('maker_id')])->links() }}
        </div>
    @endisset
</div>
@endsection
