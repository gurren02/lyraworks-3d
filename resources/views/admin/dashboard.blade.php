@php
    $activePrints = \App\Models\PrintJob::where('status', 'in_progress')->count();
    $pendingDeliveries = \App\Models\Delivery::where('status', 'pending')->count();
    $totalPrinters = \App\Models\Printer::count();
    $availablePrinters = \App\Models\Printer::where('status', 'available')->count();
    $totalMaterialGrams = \App\Models\Material::sum('stock_grams');
    $lowStockAlerts = \App\Models\Material::where('stock_grams', '<', 1000)->count();
    
    $recentDeliveries = \App\Models\Delivery::with(['customer', 'printJob'])->orderBy('scheduled_date', 'asc')->take(5)->get();

    // Estadísticas para Gráfico de Rendimiento Mensual (Bar Chart)
    $monthlyJobs = [];
    for ($m = 1; $m <= 12; $m++) {
        $monthlyJobs[] = \App\Models\PrintJob::where('status', 'finished')
            ->whereYear('updated_at', now()->year)
            ->whereMonth('updated_at', $m)
            ->count();
    }
@endphp

<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ]
]">
    <!-- Scripts Adicionales (ApexCharts CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <div class="space-y-6">
        <!-- 1. Sección de KPIs / Tarjetas de Métricas (Inspirado en TailAdmin) -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 md:gap-6">
            <!-- Impresiones Activas -->
            <div style="background-color: #F9F3E9;" class="rounded-base border border-black p-5 shadow-sm md:p-6 transition hover:shadow-md duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-center w-12 h-12 bg-white text-blue-600 border border-black rounded-xl">
                        <i class="fa-solid fa-print text-xl"></i>
                    </div>
                </div>
                <div class="flex items-end justify-between mt-5">
                    <div>
                        <span class="text-sm font-bold text-gray-700">Impresiones Activas</span>
                        <h4 class="mt-2 text-3xl font-extrabold text-black">{{ $activePrints }}</h4>
                    </div>
                    <span class="flex items-center gap-1 rounded-full bg-blue-100 border border-blue-300 py-0.5 px-2.5 text-xs font-bold text-blue-800">
                        En curso
                    </span>
                </div>
            </div>

            <!-- Envíos Pendientes -->
            <div style="background-color: #F9F3E9;" class="rounded-base border border-black p-5 shadow-sm md:p-6 transition hover:shadow-md duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-center w-12 h-12 bg-white text-amber-600 border border-black rounded-xl">
                        <i class="fa-solid fa-truck-fast text-xl"></i>
                    </div>
                </div>
                <div class="flex items-end justify-between mt-5">
                    <div>
                        <span class="text-sm font-bold text-gray-700">Envíos Pendientes</span>
                        <h4 class="mt-2 text-3xl font-extrabold text-black">{{ $pendingDeliveries }}</h4>
                    </div>
                    <span class="flex items-center gap-1 rounded-full bg-amber-100 border border-amber-300 py-0.5 px-2.5 text-xs font-bold text-amber-800">
                        Por despachar
                    </span>
                </div>
            </div>

            <!-- Estado de Impresoras -->
            <div style="background-color: #F9F3E9;" class="rounded-base border border-black p-5 shadow-sm md:p-6 transition hover:shadow-md duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-center w-12 h-12 bg-white text-green-600 border border-black rounded-xl">
                        <i class="fa-solid fa-gears text-xl"></i>
                    </div>
                </div>
                <div class="flex items-end justify-between mt-5">
                    <div>
                        <span class="text-sm font-bold text-gray-700">Impresoras Disponibles</span>
                        <h4 class="mt-2 text-3xl font-extrabold text-black">{{ $availablePrinters }} <span class="text-sm text-gray-500">/ {{ $totalPrinters }}</span></h4>
                    </div>
                    <span class="flex items-center gap-1 rounded-full bg-green-100 border border-green-300 py-0.5 px-2.5 text-xs font-bold text-green-800">
                        Operativas
                    </span>
                </div>
            </div>

            <!-- Stock de Filamento/Resina -->
            <div style="background-color: #F9F3E9;" class="rounded-base border border-black p-5 shadow-sm md:p-6 transition hover:shadow-md duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-center w-12 h-12 bg-white text-rose-600 border border-black rounded-xl">
                        <i class="fa-solid fa-droplet text-xl"></i>
                    </div>
                </div>
                <div class="flex items-end justify-between mt-5">
                    <div>
                        <span class="text-sm font-bold text-gray-700">Material en Stock</span>
                        <h4 class="mt-2 text-3xl font-extrabold text-black">{{ number_format($totalMaterialGrams / 1000, 2) }} <span class="text-sm text-gray-500">kg</span></h4>
                    </div>
                    @if($lowStockAlerts > 0)
                        <span class="flex items-center gap-1 rounded-full bg-rose-100 border border-rose-300 py-0.5 px-2.5 text-xs font-bold text-rose-800">
                            {{ $lowStockAlerts }} Alertas
                        </span>
                    @else
                        <span class="flex items-center gap-1 rounded-full bg-emerald-100 border border-emerald-300 py-0.5 px-2.5 text-xs font-bold text-emerald-800">
                            Óptimo
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- 2. Gráfica Interactiva & Tabla de Logística Side-by-Side -->
        <div class="grid grid-cols-12 gap-6">
            <!-- Gráfica Interactiva (Col: 8) -->
            <div style="background-color: #F9F3E9;" class="col-span-12 xl:col-span-8 rounded-base border border-black p-5 shadow-sm sm:p-6 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-black">Trabajos por Mes</h3>
                    </div>
                </div>
                <div class="max-w-full overflow-x-auto">
                    <div id="chart-taller" class="min-w-[300px]"></div>
                </div>
            </div>

            <!-- Tabla de Logística (Col: 4) -->
            <div style="background-color: #F9F3E9;" class="col-span-12 xl:col-span-4 rounded-base border border-black p-5 shadow-sm sm:p-6 flex flex-col justify-between">
                <div>
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-black">Próximos Envíos</h3>
                        <p class="text-sm font-medium text-gray-700">Entregas programadas en taller</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="border-b border-black text-xs font-bold uppercase text-black">
                                    <th class="pb-3">Cliente</th>
                                    <th class="pb-3">Fecha</th>
                                    <th class="pb-3 text-right">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentDeliveries as $delivery)
                                    <tr class="border-b border-black/10 hover:bg-black/5 transition duration-150">
                                        <td class="py-3 font-bold text-black text-xs">
                                            {{ $delivery->customer->name }}
                                        </td>
                                        <td class="py-3 font-medium text-gray-800 text-xs">
                                            {{ $delivery->scheduled_date->format('d/m H:i') }}
                                        </td>
                                        <td class="py-3 text-right">
                                            @if($delivery->status === 'pending')
                                                <span class="inline-flex rounded-full bg-amber-100 border border-amber-300 px-2 py-0.5 text-3xs font-bold text-amber-800">
                                                    Pte.
                                                </span>
                                            @elseif($delivery->status === 'delivered')
                                                <span class="inline-flex rounded-full bg-emerald-100 border border-emerald-300 px-2 py-0.5 text-3xs font-bold text-emerald-800">
                                                    Entregado
                                                </span>
                                            @else
                                                <span class="inline-flex rounded-full bg-rose-100 border border-rose-300 px-2 py-0.5 text-3xs font-bold text-rose-800">
                                                    Can.
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-8 text-gray-600 text-sm">
                                            Sin envíos.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script de Inicialización de Gráfica ApexCharts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                series: [{
                    name: 'Trabajos completados',
                    data: @json($monthlyJobs)
                }],
                chart: {
                    fontFamily: 'Outfit, Inter, sans-serif',
                    type: 'bar',
                    height: 290,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '30%',
                        borderRadius: 6,
                        borderRadiusApplication: 'end'
                    },
                },
                colors: ['#3C50E0'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                grid: {
                    borderColor: 'rgba(0, 0, 0, 0.05)',
                    strokeDashArray: 5,
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#111827',
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#111827',
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    enabled: true,
                    custom: function({series, seriesIndex, dataPointIndex, w}) {
                        var val = series[seriesIndex][dataPointIndex];
                        return '<div class="p-2 bg-white text-black border border-black rounded-base shadow-sm font-bold text-xs">' +
                            'Total de trabajos: ' + val +
                            '</div>';
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-taller"), options);
            chart.render();
        });
    </script>
</x-admin-layout>
