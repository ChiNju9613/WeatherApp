<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #c1d4ec;
            background: linear-gradient(140deg, rgb(147, 219, 248) 0%, rgb(234, 238, 239) 50%, rgb(147, 219, 248) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            padding: 40px 36px;
            width: 100%;
            max-width: 430px;
            box-shadow: 0 6px 30px rgba(0,0,0,0.07);
        }

        /* ── HEADER ── */
        .app-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .app-icon {
            width: 44px; height: 44px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
        }

        .app-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
        }

        .app-sub {
            font-size: 0.72rem;
            color: #94a3b8;
        }

        /* ── FORM ── */
        .search-row {
            display: flex;
            gap: 10px;
            margin-bottom: 14px;
        }

        input[type="text"] {
            flex: 1;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 0.88rem;
            font-family: inherit;
            color: #0f172a;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]::placeholder { color: #cbd5e1; }

        input[type="text"]:focus {
            border-color: #3b82f6;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
        }

        button[type="submit"] {
            background: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 0.88rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            white-space: nowrap;
        }

        button[type="submit"]:hover { background: #2563eb; transform: translateY(-1px); }

        /* ── ERRORS ── */
        .error-msg {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.82rem;
            color: #dc2626;
            font-weight: 500;
            margin-bottom: 16px;
            animation: fadeUp 0.3s ease both;
        }

        /* ── WEATHER RESULT ── */
        .weather-card {
            background: linear-gradient(140deg, #d0e1f8 0%, #2371a5 500%, #d0e1f8 100%);
            border: 1px solid #bfdbfe;
            border-radius: 16px;
            padding: 26px 22px;
            margin-top: 20px;
            animation: fadeUp 0.4s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .wc-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .wc-city {
            font-size: 1.45rem;
            font-weight: 700;
            color: #1e3a5f;
            line-height: 1.2;
        }

        .wc-icon { font-size: 3rem; line-height: 1; }

        .wc-desc {
            font-size: 0.8rem;
            color: #64748b;
            text-transform: capitalize;
            margin-bottom: 22px;
        }

        /* Big temp display */
        .wc-temp-block {
            display: flex;
            align-items: flex-end;
            gap: 6px;
            margin-bottom: 22px;
        }

        .wc-temp-num {
            font-size: 3rem;
            font-weight: 700;
            color: #1e3a5f;
            line-height: 1;
            font-variant-numeric: tabular-nums;
        }

        .wc-temp-unit {
            font-size: 1.1rem;
            font-weight: 500;
            color: #3b82f6;
            margin-bottom: 6px;
        }

        .wc-feels {
            font-size: 0.78rem;
            color: #64748b;
            margin-bottom: 22px;
        }

        .wc-feels span { font-weight: 600; color: #1e3a5f; }

        /* Stats */
        .wc-divider {
            border: none;
            border-top: 1px solid #bfdbfe;
            margin-bottom: 18px;
        }

        .wc-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .wc-stat {
            background: rgba(255,255,255,0.65);
            border: 1px solid rgba(191,219,254,0.6);
            border-radius: 10px;
            padding: 12px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .wc-stat-icon { font-size: 1.1rem; flex-shrink: 0; }

        .wc-stat-label {
            font-size: 0.62rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #94a3b8;
            margin-bottom: 2px;
        }

        .wc-stat-val {
            font-size: 0.88rem;
            font-weight: 600;
            color: #1e3a5f;
            font-variant-numeric: tabular-nums;
        }

        .wc-icon img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<div class="card">

    <div class="app-header">
        <div class="app-icon">🌤</div>
        <div>
            <div class="app-title">Weather App</div>
            <div class="app-sub">Real-time weather info</div>
        </div>
    </div>

    <form method="POST" action="/">
        @csrf
        <div class="search-row">
            <input type="text" name="city" placeholder="Enter city name…" autocomplete="off">
            <button type="submit">Search</button>
        </div>
    </form>

    {{-- Validation error --}}
    @error('city')
        <div class="error-msg">⚠️ {{ $message }}</div>
    @enderror

    {{-- API error --}}
    @if(session('error'))
        <div class="error-msg">⚠️ {{ session('error') }}</div>
    @endif

    @isset($data)
     
    <div class="weather-card">
        <div class="wc-top">
            <div class="wc-city">{{ $data['name'] }}</div>
            @php

                $wMain = strtolower($data['weather'][0]['main'] ?? '');

                $icons = [
                    'clear' => '☀️',
                    'clouds' => '☁️',
                    'rain' => '🌧️',
                    'drizzle' => '🌦️',
                    'thunderstorm' => '⛈️',
                    'snow' => '❄️',
                    'mist' => '🌫️',
                    'fog' => '🌫️',
                    'haze' => '🌫️',
                ];

                $icon = $icons[$wMain] ?? '🌡️';

            @endphp
            <div class="wc-icon">
                <div style="font-size:60px;">
                    {{ $icon }}
                </div>
            </div>
        </div>
        <div class="wc-desc">{{ $data['weather'][0]['description'] }}</div>

        <div class="wc-temp-block">
            <div class="wc-temp-num">{{ number_format($data['main']['temp'], 2) }}</div>
            <div class="wc-temp-unit">°C</div>
        </div>

        <div class="wc-feels">
            Feels like <span>{{ number_format($data['main']['feels_like'], 2) }} °C</span>
        </div>

        <hr class="wc-divider">

        <div class="wc-stats">
            <div class="wc-stat">
                <div class="wc-stat-icon">💧</div>
                <div>
                    <div class="wc-stat-label">Humidity</div>
                    <div class="wc-stat-val">{{ $data['main']['humidity'] }}%</div>
                </div>
            </div>
            <div class="wc-stat">
                <div class="wc-stat-icon">💨</div>
                <div>
                    <div class="wc-stat-label">Wind</div>
                    <div class="wc-stat-val">{{ $data['wind']['speed'] }} m/s</div>
                </div>
            </div>
        </div>
    </div>
    @endisset

</div>

</body>
</html>