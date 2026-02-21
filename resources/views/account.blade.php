@extends('layout.index')

@section('main')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Профиль</h2>
            <div class="text-muted">Здравствуйте, {{ Auth::user()->full_name }}</div>
        </div>
        <a class="btn btn-primary" href="{{ route('tickets.buy') }}">Купить билет</a>
    </div>

    <div class="card p-4 rounded-4 border-0 shadow-lg">
        <h4 class="fw-bold mb-3">Мои билеты</h4>

        @if($tickets->isEmpty())
            <div class="text-muted">Пока нет оплаченных билетов.</div>
        @else
            <div class="row g-3">
                @foreach($tickets as $ticket)
                    <div class="col-12 col-md-6">
                        <div class="p-3 rounded-4" style="background:#f6f9ff;border:1px solid #e2e8f0;">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-semibold">Входной билет</div>
                                    <div class="text-muted small">Код: <span class="fw-semibold">{{ $ticket->code }}</span></div>
                                    <div class="text-muted small">Оплачено: {{ optional($ticket->paid_at)->format('d.m.Y H:i') }}</div>
                                </div>
                                <div class="fw-bold fs-5">{{ $ticket->amount }}₽</div>
                            </div>

                            {{-- QR-макет (простая “муляжная” графика) --}}
                            @php
                                $hash = md5($ticket->code);
                                $bits = '';
                                foreach (str_split($hash) as $c) {
                                    $bits .= str_pad(base_convert($c, 16, 2), 4, '0', STR_PAD_LEFT);
                                }
                                $size = 21; // квадрат 21x21
                            @endphp

                            <div class="mt-3 d-inline-block p-2 bg-white rounded-3" style="border:1px solid #e2e8f0;">
                                <div style="display:grid;grid-template-columns:repeat({{ $size }},6px);gap:1px;">
                                    @for($i=0; $i < $size*$size; $i++)
                                        @php $on = ($bits[$i % strlen($bits)] ?? '0') === '1'; @endphp
                                        <div style="width:6px;height:6px;background:{{ $on ? '#0f172a' : '#ffffff' }};"></div>
                                    @endfor
                                </div>
                            </div>

                            <div class="text-muted small mt-2">Покажите QR на входе (демо-макет)</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection