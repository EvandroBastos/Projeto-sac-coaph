@extends('layouts.app')

@section('content')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@include('fullcalendar.modal-calendar')
@include('fullcalendar.modal-fastEvent')


  <style>
    html, body {
        background-color:#F8F8FF;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
</style>


<div id='wrap'>

    <div id='external-events'>
      <h4>Lista dos Eventos</h4>

      <div id='external-events-list'>

            @isset($fastEvents)
                @forelse($fastEvents as $fastEvent)
                    <div id="boxFastEvent{{ $fastEvent->id }}"
                        style="padding: 4px; border: 1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                        class='fc-event event text-center'
                        data-event='{"id":"{{ $fastEvent->id }}","title":"{{ $fastEvent->title }}","color":"{{ $fastEvent->color }}","start":"{{ $fastEvent->start }}","end":"{{ $fastEvent->end }}"}'>
                        {{ $fastEvent->title }}
                    </div>
                @empty
                    <p>Não há eventos rápidos a serem visualizados</p>
                @endforelse
            @endisset

        </div>

      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remover após arrastar</label>
        <button class="btn btn-sm btn-success" id="newFastEvent" style="font-size: 1em; width: 100%;">Criar novo evento</button>
      </p>
    </div>

    <div id='calendar'
    data-route-load-events="{{ route('routeLoadEvents') }}"
    data-route-event-update="{{ route('routeEventUpdate') }}"
    data-route-event-store="{{ route('routeEventStore') }}"
    data-route-event-delete="{{ route('routeEventDelete') }}"

    data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
    data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
    data-route-fast-event-store="{{ route('routeFastEventStore') }}"
    ></div>

    <div style='clear:both'></div>

  </div>
</body>

</html>

@endsection
