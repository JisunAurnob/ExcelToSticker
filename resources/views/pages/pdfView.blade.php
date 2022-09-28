<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .page-break {
            page-break-after: always;
        }

        /* @page { vertical-align:middle; } */
        /* @page { size:5in 5in; } */
    </style>

    <title>Excel To PDF - @yield('title')</title>
</head>

<body>
    <div>
        <div class="">
            {{-- {{dd($excelData)}} --}}
            @foreach ($excelData as $edata)
                @if ($edata[0] != 'Hoist Label')
                    {{-- {{dd($edata)}} --}}
                    {{-- @for ($j = 1; $j < count($edata); $j++) --}}
                    {{-- @if ($edata[$j] != '') --}}
                    <div id="pdf" class="page-break" style="vertical-align:middle">

                        @if (substr($edata[1], -3) != 'Ton')
                            <center><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                <div width="100%"><img
                                        style="width:6in; height:6in; display: flex;
                                        align-items: center"
                                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/default.jpg'))) }}">
                                </div>
                            </center>
                        @else
                            {{-- Hoist Lebel[0] --}}
                            <p style="position: fixed; left: 18%; top: 28%; font-size: 30px;"><b>{{ $edata[0] }}</b>
                            </p>
                            {{-- Hoist Type[1] --}}
                            <p style="position: fixed; left: 40%; top: 45%; font-size: 25px;">
                                <b>{{ substr($edata[1], 0, -2) }}</b>
                            </p>
                            {{-- Function[2] --}}
                            @if (strlen($edata[2]) > 7)
                                <p style="position: fixed; right: 39.5%; top: 47%; font-size: 14px;">
                                    <b>{{ $edata[2] }}</b>
                                </p>
                            @else
                                <p style="position: fixed; right: 40.5%; top: 45%; font-size: 18px;">
                                    <b>{{ $edata[2] }}</b>
                                </p>
                            @endif
                            {{-- X[4] --}}
                            <p style="position: fixed; left: 16%; top: 45%; font-size: 22px; color:blue;"><b>X:
                                    {{ $edata[4] }}</b></p>
                            {{-- Y[5] --}}
                            <p style="position: fixed; left: 16%; top: 50%; font-size: 22px; color:green;"><b>Y:
                                    {{ $edata[5] }}</b></p>
                            {{-- Total Point Load [3] new[6] --}}
                            @if (ceil((float) $edata[6]) != 0)
                                <p style="position: fixed; right: 18%; top: 65%; font-size: 25px;">
                                    <b>{{ ceil((float) $edata[6]) }}LB</b>
                                </p>
                            @endif
                            {{-- Layer[6]  new Power Cable Length[7] --}}
                            @if (ceil((float) $edata[7]) != 0)
                                <p style="position: fixed; right: 18%; top: 28%; font-size: 24px;">
                                    <b>{{ $edata[7] }}</b>
                                </p>
                            @endif
                            {{-- Name[7] --}}
                            {{-- <p style="position: fixed; left: 16%; top: 63%; font-size: 20px;">
                                <b>{{ $edata[7] }}</b>
                            </p> --}}
                            {{-- Symbol User 1 [8] --}}
                            <p style="position: fixed; left: 16%; top: 64%; font-size: 18px;">
                                <b> {{ $edata[8] }}</b>
                            </p>
                            {{-- Symbol Used[8] new Load Trim[9] --}}
                            <p style="position: fixed; left: 16%; top: 67%; font-size: 18px;">
                                <b>TRM: {{ $edata[9] }}</b>
                            </p>
                            {{-- Hoist Type[1] --}}
                            @if ($edata[1] == '1 Ton')
                                <center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <div width="100%"><img
                                            style="width:5in; height:5in; display: flex;
                                        align-items: center"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/1T.jpg'))) }}">
                                    </div>
                                </center>
                            @elseif($edata[1] == '1/4 Ton')
                                <center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <div width="100%"><img
                                            style="width:5in; height:5in; display: flex;
                                        align-items: center;"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/1_4T.jpg'))) }}">
                                    </div>
                                </center>
                            @elseif($edata[1] == '1/2 Ton')
                                <center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <div width="100%"><img
                                            style="width:5in; height:5in; display: flex;
                                        align-items: center;"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/2T_1000.jpg'))) }}">
                                    </div>
                                </center>
                            @elseif($edata[1] == '2 Ton')
                                <center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <div width="100%"><img
                                            style="width:5in; height:5in; display: flex;
                                        align-items: center;"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/2T_4000.jpg'))) }}">
                                    </div>
                                </center>
                            @else
                                {{-- {{ $edata[$j][8] }} --}}
                            @endif
                        @endif
                    </div>
                    {{-- @endif --}}
                    {{-- @endfor --}}
                @endif
            @endforeach
        </div>
    </div>
</body>

</html>
