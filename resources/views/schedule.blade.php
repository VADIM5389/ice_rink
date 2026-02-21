@extends('layout.index')

@section('main')
<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold mb-2">Расписание катания</h2>
        <p class="text-muted">1 час катания • 30 минут перезаливка льда</p>
    </div>

    <div class="row g-3">
        @php
        $startTime = 8 * 60;   // 08:00 в минутах
        $endTime = 22 * 60;    // 22:00 в минутах
        $current = $startTime;
    @endphp

    <div class="row g-3">

    @while($current < $endTime)

        {{-- Катание 60 минут --}}
        @php
            $skateStart = $current;
            $skateEnd = $current + 60;
        @endphp

        @if($skateEnd <= $endTime)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="schedule-card skating p-3 rounded-4 text-center">
                    <div class="fw-bold fs-5">
                        {{ floor($skateStart/60) }}:{{ sprintf('%02d',$skateStart%60) }}
                        –
                        {{ floor($skateEnd/60) }}:{{ sprintf('%02d',$skateEnd%60) }}
                    </div>
                    <div class="text-muted small">Свободное катание</div>
                </div>
            </div>
        @endif

        @php
            $current = $skateEnd;
        @endphp

        {{-- Перезаливка 30 минут --}}
        @php
            $maintStart = $current;
            $maintEnd = $current + 30;
        @endphp

        @if($maintEnd <= $endTime)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="schedule-card maintenance p-3 rounded-4 text-center">
                    <div class="fw-bold fs-6">
                        {{ floor($maintStart/60) }}:{{ sprintf('%02d',$maintStart%60) }}
                        –
                        {{ floor($maintEnd/60) }}:{{ sprintf('%02d',$maintEnd%60) }}
                    </div>
                    <div class="text-muted small">Перезаливка льда</div>
                </div>
            </div>
        @endif

        @php
            $current = $maintEnd;
        @endphp

    @endwhile

    </div>

</div>
@endsection