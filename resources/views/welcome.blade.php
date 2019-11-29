<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            $(function () {
                var ctx = document.getElementById("myChart").getContext('2d')
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['注册会员', '黄金会员', '钻石会员', '至尊会员'],
                        datasets: [
                            {
                                label: '昨日新增',
                                data: [12, 19, 3, 5],
                                borderColor:'blue',
                                backgroundColor:'skyBlue',
                                borderWidth: 1,
                            },
                            {
                                label: '总用户',
                                data: [182, 51, 133, 54],
                                borderColor:'red',
                                backgroundColor:'pink',
                                borderWidth: 1,
                            },

                        ]
                    }
                });
            });
        </script>
        <title>Laravel</title>
    </head>
    <body>
    <canvas id="myChart"></canvas>
    </body>
</html>
