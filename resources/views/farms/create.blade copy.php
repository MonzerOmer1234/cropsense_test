@extends('layouts.dashboard')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

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
                        <form action="{{ route('farms.store') }}" method="POST">
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
                                <div class="col-lg-7">
                                    <div id="map" style="height: 400px;"></div>
                                    <div class="input-style-1">
                                        <label>{{ __('Latitude') }}</label>
                                        <input type="text"  id="lat" name="lat" required>
                                    </div>
                                    <div class="input-style-1">
                                        <label>{{ __('Longitude') }}</label>
                                        <input type="text"  id="lon" name="lon" required>
                                </div>
                            </div>
                            <div class="button-group">
                                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                    {{__("Save")}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Location  Map  End  --}}
            </div>
        </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // reset lat and lon to null
        document.getElementById('lat').value = null;
        document.getElementById('lon').value = null;
        var map = L.map('map').setView([24.7136, 46.6753], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker;

        function updateMarker(lat, lng) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lng]).addTo(map);
            map.setView([lat, lng], map.getZoom());
        }

        map.on('click', function(e) {
            updateMarker(e.latlng.lat, e.latlng.lng);
            document.getElementById('lat').value = e.latlng.lat.toFixed(6);
            document.getElementById('lon').value = e.latlng.lng.toFixed(6);
        });

        document.getElementById('lat').addEventListener('change', function() {
            var lat = parseFloat(this.value);
            var lng = parseFloat(document.getElementById('lon').value);
            if (!isNaN(lat) && !isNaN(lng)) {
                updateMarker(lat, lng);
            }
        });

        document.getElementById('lon').addEventListener('change', function() {
            var lat = parseFloat(document.getElementById('lat').value);
            var lng = parseFloat(this.value);
            if (!isNaN(lat) && !isNaN(lng)) {
                updateMarker(lat, lng);
            }
        });
    });
    </script>
@endsection
