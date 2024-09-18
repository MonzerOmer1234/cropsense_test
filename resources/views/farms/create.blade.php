@extends('layouts.dashboard')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />

@section('content')
    <section class="card-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>{{ __('Create Farm') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row">
                {{-- Basic Data  --}}
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <form id="farmForm" action="{{ route('farms.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="input-style-1">
                                        <label>{{ __('Name') }}</label>
                                        <input type="text" placeholder="{{ __('Name') }}" required name="name" />
                                    </div>
                                    <div class="input-style-1">
                                        <label>{{ __('Location') }}</label>
                                        <input type="text" placeholder="{{ __('Location') }}" required name="location" />
                                        @error('location')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-style-1">
                                        <label>{{ __('Size') }}</label>
                                        <input type="text" placeholder="{{ __('Size') }}" required name="size" />
                                        @error('size')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-style-1">
                                        <label>{{ __('Crop Type') }}</label>
                                        <input type="text" placeholder="{{ __('Crop Type') }}" required name="crop_type" />
                                        @error('crop_type')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-style-1">
                                        <label>{{ __('Description') }}</label>
                                        <textarea placeholder="{{ __('Description') }}" rows="5" name="description"></textarea>
                                    </div>
                                </div>
                                {{-- Location  Map  --}}
                                <div class="col-lg-7">
                                    <div class="card-style mb-30">
                                        <h4 class="mb-3">Farm Location Map</h4>
                                        <p class="mb-3">Use the drawing tools to outline your farm's boundaries on the map. Click to add points and double-click to finish.</p>
                                        <div id="map" style="height: 400px;"></div>
                                        <input type="hidden" id="points" name="points" required>
                                        <button type="button" id="resetPolygon" class="btn btn-danger mt-2">Reset Polygon</button>
                                    </div>
                                </div>
                                {{-- Location  Map  End  --}}
                            </div>
                            <div class="button-group">
                                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                    {{__("Save")}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([24.7136, 46.6753], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                polygon: true,
                polyline: false,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false
            },
            edit: {
                featureGroup: drawnItems,
                remove: true
            }
        });
        map.addControl(drawControl);

        map.on('draw:created', function (e) {
            drawnItems.clearLayers();
            var layer = e.layer;
            drawnItems.addLayer(layer);
            updatePointsInput();
        });

        map.on('draw:edited', function (e) {
            updatePointsInput();
        });

        map.on('draw:deleted', function (e) {
            updatePointsInput();
        });

        function updatePointsInput() {
            var polygonData = [];
            drawnItems.eachLayer(function(layer) {
                if (layer instanceof L.Polygon) {
                    polygonData = layer.getLatLngs()[0].map(function(latlng) {
                        return [latlng.lat, latlng.lng];
                    });
                }
            });
            document.getElementById('points').value = JSON.stringify(polygonData);
        }

        document.getElementById('resetPolygon').addEventListener('click', function() {
            drawnItems.clearLayers();
            document.getElementById('points').value = '';
        });

        document.getElementById('farmForm').addEventListener('submit', function(e) {
            var points = document.getElementById('points').value;
            if (!points && !confirm('No polygon drawn. Are you sure you want to save without drawing a polygon?')) {
                e.preventDefault();
            }
        });
    });
    </script>
@endsection
