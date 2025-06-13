@extends('layout.v_dashboard_tamplate')

@section('content')
<body>
    <h1>Summary</h1>
    <div class="summary-cards">
        <div class="card">
            <h2>Rp. {{ number_format($totalVolume, 0, ',', '.') }}</h2>
            <p>Total Volume (Month to Date)</p>
        </div>
        <div class="card">
            <h2>{{ $totalTransactions }}</h2>
            <p>Total Transaction (Month to Date)</p>
        </div>
    </div>

    </body>
@endsection