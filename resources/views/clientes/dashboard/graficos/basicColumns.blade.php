<script>
    @if(isset($graficos['basicColumn']))
        Highcharts.chart('graficoBasicColumns', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Tarefas criadas x Tarefas Concluidas',
                align: 'left'
            },
            xAxis: {
                categories: [
                        @foreach($graficos['basicColumn'] as $mesAno => $valores)
                            `{{ $mesAno }}`,
                        @endforeach
                ],
                crosshair: true,
                accessibility: {
                    description: 'Meses e Anos'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Quantidade'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Tarefas criadas',
                    data: [
                        @isset($graficos['basicColumn'])
                            @foreach($graficos['basicColumn'] as $mesAno => $valores)
                                {{ $valores['0'] + $valores['1'] }},
                           @endforeach
                        @endisset
                    ]
                },
                {
                    name: 'Tarefas concluidas',
                    data: [
                        @foreach($graficos['basicColumn'] as $mesAno => $valores)
                            {{ $valores['1'] }},
                        @endforeach
                    ]
                }
            ]
        });
    @endif
</script>
