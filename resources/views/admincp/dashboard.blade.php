@extends('layouts.app')

@section('title', 'Overview - ' . env('APP_NAME'))

@section('content')
    <div class="flex items-center justify-center w-full p-4 mb-4 bg-gray-500 rounded-lg">
        <h1 class="text-xl font-[1000] text-white">Overview</h1>
    </div>
    <div class="flex flex-col w-full md:flex-row">
        <div class="flex flex-col w-full p-4 bg-white border rounded-xl">
            <div id="chart" class="h-full">
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full mt-4" id="overview_statistics">
        <div class="grid grid-cols-1 xs:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2">
            <div class="flex flex-col gap-4 p-4 mb-3 leading-none bg-white border rounded-xl md:mb-0">
                <div class="flex flex-col items-center justify-center">
                    <span class="mb-2 text-3xl font-medium text-primary-normal">{{ $data['visitors']['today'] }}</span>
                    <span class="font-normal text-gray-500 text-normal">Visitors today</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <span
                        class="text-xl font-medium {{ $data['visitors']['color'] }}">{{ $data['visitors']['percentage'] }}%</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        const activeSection = document.getElementById("sidebar-overview");

        activeSection.classList.add("text-primary-normal", "bg-gray-200");

        let chartHeight = document.querySelector("#overview_statistics").clientHeight;

        let options = {
            chart: {
                type: "area",
                toolbar: {
                    tools: {
                        zoom: false,
                        zoomin: false,
                        zoomout: false,
                        reset: false,
                        pan: false
                    }
                },
                height: '100%',
                maintainAspectRatio: false,
                responsive: true,
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                    name: "Visitors",
                    data: [{!! implode(', ', $chart_data['visitors']) !!}]
                },

            ],
        }
    </script>
@endsection
