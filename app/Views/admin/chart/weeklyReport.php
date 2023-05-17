<script>
    //Chart 5 
    new Chartist.Line('.ct-chart-sales-value', {
        labels: [
            <?php foreach ($reports as $report) : ?>
                <?php
                $month = date('m', strtotime($report['date']));
                $date = date('d', strtotime($report['date']));
                ?> '<?= $month ?>' + '-' + '<?= $date ?>',
            <?php endforeach ?>
        ],
        series: [
            [
                <?php foreach ($reports as $report) : ?>
                    <?= $report['total_request']; ?>,
                <?php endforeach ?>
            ]
        ]
    }, {
        low: 0,
        showArea: true,
        fullWidth: true,
        plugins: [
            Chartist.plugins.tooltip()
        ],
        axisX: {
            // On the x-axis start means top and end means bottom
            position: 'end',
        },
        axisY: {
            // On the y-axis start means left and end means right
            position: 'start',
            showLabel: false,

        }
    });
</script>