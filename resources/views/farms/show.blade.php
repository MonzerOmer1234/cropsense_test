@extends('layouts.dashboard')

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
{{-- <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" /> --}}

<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
{{-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> --}}

@vite(['resources/js/app.js'])


@section('content')
    <section class="section">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-style mb-30">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">{{$farm->name}}</h2>
                            <a href="{{ route('farms.edit', $farm->id) }}" class="main-btn primary-btn btn-hover">
                                <i class="lni lni-pencil mr-5"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>



            </div>

            <div class="row">
                {{-- farm operations section --}}
                <div class="col-4">
                    <div class="card-style mb-30">
                        <h6 class="mb-10">Latest Farm Operations</h6>
                        <div class="table-wrapper table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6>Type</h6>
                                        </th>
                                        <th>
                                            <h6>Worker</h6>
                                        </th>
                                        <th>
                                            <h6>Area</h6>
                                        </th>
                                        <th>
                                            <h6>Quantity</h6>
                                        </th>
                                        <th>
                                            <h6>Date</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farm_operations as $operation)
                                        <tr>
                                            <td class="min-width">
                                                <p>{{ ucfirst($operation->type) }}</p>
                                            </td>
                                            <td class="min-width">
                                                <p>{{ $operation->worker->name }}</p>
                                            </td>
                                            <td class="min-width">
                                                <p>{{ $operation->area }}</p>
                                            </td>
                                            <td class="min-width">
                                                <p>{{ $operation->quantity ?? 'N/A' }}</p>
                                            </td>
                                            <td class="min-width">
                                                <p>{{ $operation->created_at->format('M d, Y') }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- end of farm operations section --}}

                {{-- farm map section --}}

                <div class="col-8" id="app">
                    {{-- <div class="card-style mb-30">
                        <h6 class="mb-10">Farm Map</h6>
                        <farm-map :latitude="{{ $farm->lat ?? 24.7136 }}" :longitude="{{ $farm->lon ?? 46.6753 }}" :farm-name="{{ json_encode($farm->name) }}"
                            :address="{{json_encode($farm->location)}}" ></farm-map>
                    </div> --}}
                    {{-- Farm Map Polygon using points --}}
                    <div class="card-style mb-30">
                        <h6 class="mb-10">Farm Map</h6>
                        <farm-map-polygon :latitude="{{ 24.7136 }}" :longitude="{{ 46.6753 }}" :farm-name="{{ json_encode($farm->name) }}"
                            :address="{{json_encode($farm->location)}}" :polygon-data="{{json_encode($farm->points)}}" ></farm-map-polygon>
                    </div>
                </div>
                {{-- end of farm map section --}}
            </div>



            <!-- charts section -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="light-tab" data-bs-toggle="tab" data-bs-target="#light"
                                type="button" role="tab" aria-controls="light" aria-selected="true">Light</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="temperature-tab" data-bs-toggle="tab" data-bs-target="#temperature"
                                type="button" role="tab" aria-controls="temperature"
                                aria-selected="false">Temperature</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="humidity-tab" data-bs-toggle="tab" data-bs-target="#humidity"
                                type="button" role="tab" aria-controls="humidity"
                                aria-selected="false">Humidity</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tds-tab" data-bs-toggle="tab" data-bs-target="#tds"
                                type="button" role="tab" aria-controls="tds" aria-selected="false">TDS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="soil-moisture-tab" data-bs-toggle="tab"
                                data-bs-target="#soil-moisture" type="button" role="tab" aria-controls="soil-moisture"
                                aria-selected="false">Soil Moisture</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="light" role="tabpanel"
                            aria-labelledby="light-tab">
                            <div style="width: 70%; height: 300px; margin: auto; margin-top: 20px">
                                <canvas id="lightLineChart"></canvas>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="temperature" role="tabpanel" aria-labelledby="temperature-tab">
                            <div style="width: 70%; height: 300px; margin: auto; margin-top: 20px">
                                <canvas id="temperatureLineChart"></canvas>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="humidity" role="tabpanel" aria-labelledby="humidity-tab">
                            <div style="width: 70%; height: 300px; margin: auto; margin-top: 20px">
                                <canvas id="humidityLineChart"></canvas>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tds" role="tabpanel" aria-labelledby="tds-tab">
                            <div style="width: 70%; height: 300px; margin: auto; margin-top: 20px">
                                <canvas id="tdsLineChart"></canvas>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="soil-moisture" role="tabpanel"
                            aria-labelledby="soil-moisture-tab">
                            <div style="width: 70%; height: 300px; margin: auto; margin-top: 20px">
                                <canvas id="soilMoistureLineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of charts section -->





        </div>
    </section>


    <hr>


    {{-- Map Script --}}
    {{-- <script>

        var map = L.map('farmMap').setView([{{ json_encode($farm->lat) ?? 24.7136 }}, {{ json_encode($farm->lon) ?? 46.6753 }}], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script> --}}

    {{-- light script --}}

    <script>
        var ctx = document.getElementById('lightLineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($lightReads['labels']),
                datasets: [{
                    label: 'Light Data',
                    data: @json($lightReads['data']),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    {{-- temperature script --}}
    <script>
        var ctx = document.getElementById('temperatureLineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($temperatureReads['labels']),
                datasets: [{
                    label: 'Temperature Data',
                    data: @json($temperatureReads['data']),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    {{-- humidity sensor script --}}
    <script>
        var ctx = document.getElementById('humidityLineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($humidityReads['labels']),
                datasets: [{
                    label: 'Humidity Data',
                    data: @json($humidityReads['data']),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    {{-- tds sensor script --}}
    <script>
        var ctx = document.getElementById('tdsLineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($tdsReads['labels']),
                datasets: [{
                    label: 'tds Data',
                    data: @json($tdsReads['data']),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    {{-- soil Moisture sensor script --}}
    <script>
        var ctx = document.getElementById('soilMoistureLineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($soilMoistureReads['labels']),
                datasets: [{
                    label: 'soil Moisture Data',
                    data: @json($soilMoistureReads['data']),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
