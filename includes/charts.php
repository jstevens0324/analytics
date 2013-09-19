<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jstevens
 * Date: 9/17/13
 * Time: 8:59 AM
 * To change this template use File | Settings | File Templates.
 */

?>
<!--script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['controls']});
    google.load('visualization', '1', {packages:['table']});

    google.load('visualization', '1', {'packages':['motionchart']});
</script-->
<script type="text/javascript" src="//www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['controls']});
    google.load('visualization', '1', {packages: ['table', 'columnchart']});
    google.load('visualization', '1', {packages: ['annotatedtimeline']});
    google.load("visualization", "1", {packages:["corechart"]});

    //google.load('visualization', '1', {'packages': ['geomap']});
</script>

<script type="text/javascript">
    function drawVisualization() {
        var data = new google.visualization.DataTable();
        data.addColumn('datetime', 'Date');
        data.addColumn('number', 'Income');

        data.addRows([
            [new Date(2013, 8 ,17, 6), 300],
            [new Date(2013, 8 ,17, 7), 140],
            [new Date(2013, 8 ,17, 8), 550],
            [new Date(2013, 8 ,17, 9), 752],
            [new Date(2013, 8 ,17, 10), 414],
            [new Date(2013, 8 ,17, 11), 333],
            [new Date(2013, 8 ,17, 12), 300],
            [new Date(2013, 8 ,17, 13), 140],
            [new Date(2013, 8 ,17, 14), 550],
            [new Date(2013, 8 ,17, 15), 752],
            [new Date(2013, 8 ,17, 16), 414],
            [new Date(2013, 8 ,17, 17), 333],
            [new Date(2013, 8 ,17, 18), 414]
        ]);

        var annotatedtimeline = new google.visualization.AnnotatedTimeLine(
            document.getElementById('visualization'));
        annotatedtimeline.draw(data, { 'zoomStartTime': new Date(2013, 8 , 17, 6 , 0)});
    }

    google.setOnLoadCallback(drawVisualization);
</script>


<script type="text/javascript">

    function drawVisualization() {
        var dataTable = google.visualization.arrayToDataTable([
            ['Hours', 'Income'],
            ['6 AM',776733],
            ['7 AM',3694820],
            ['8 AM',7070],
            ['9 AM',8175173],
            ['10 AM',776733],
            ['11 AM',3694820],
            ['12 PM',70708],
            ['1 PM',8175173],
            ['2 PM',70708],
            ['3 PM',8175173],
            ['4 PM',70708],
            ['5 PM',8175173],
            ['6 PM',70708],
            ['7 PM',8175173],
            ['8 PM',70708],
            ['9 PM',8175173]
        ]);

        var table = new google.visualization.Table(document.getElementById('table'));
       /* var formatter = new google.visualization.TableNumberFormat(
            {prefix: "$", negativeColor: 'red', negativeParens: true});
        formatter.format(dataTable, 1); */// Apply formatter to second column
        table.draw(dataTable, {width: 200});

        var dataView = new google.visualization.DataView(dataTable);
        dataView.setColumns([0, 1]);

        var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
        chart.draw(dataView, {height: 200});
    }



    google.setOnLoadCallback(drawVisualization);
</script>


<script type="text/javascript">
    function drawVisualization() {
        // Prepare the data
        var data = google.visualization.arrayToDataTable([
            ['Hour','Income'],
            ['6 AM',776733],
            ['7 AM',3694820],
            ['8 AM',70708],
            ['9 AM',8175173],
            ['10 AM',776733],
            ['11 AM',3694820],
            ['12 PM',70708],
            ['1 PM',8175173]
        ]);

        // Define category pickers for 'Country', 'Region/State' and 'City'
        /*var countryPicker = new google.visualization.ControlWrapper({
            'controlType': 'CategoryFilter',
            'containerId': 'control1',
            'options': {
                'filterColumnLabel': 'Day',
                'ui': {
                    'labelStacking': 'vertical',
                    'allowTyping': false,
                    'allowMultiple': false
                }
            }
        });*/

        /*var regionPicker = new google.visualization.ControlWrapper({
            'controlType': 'CategoryFilter',
            'containerId': 'control2',
            'options': {
                'filterColumnLabel': 'Species',
                'ui': {
                    'labelStacking': 'vertical',
                    'allowTyping': false,
                    'allowMultiple': false
                }
            }
        });*/

        var cityPicker = new google.visualization.ControlWrapper({
            'controlType': 'CategoryFilter',
            'containerId': 'control3',
            'options': {
                'filterColumnLabel': 'Hour',
                'ui': {
                    'labelStacking': 'vertical',
                    'allowTyping': false
                }
            }
        });

        // Define a bar chart to show 'Population' data
        var barChart = new google.visualization.ChartWrapper({
            'chartType': 'BarChart',
            'containerId': 'chart1',
            'options': {
                'width': 400,
                'height': 300,
                'chartArea': {top: 0, right: 0, bottom: 0}
            },
            // Configure the barchart to use columns 2 (City) and 3 (Population)
            'view': {'columns': [0, 1]}
        });

        // Create the dashboard.
        new google.visualization.Dashboard(document.getElementById('dashboard')).
            // Configure the controls so that:
            // - the 'Country' selection drives the 'Region' one,
            // - the 'Region' selection drives the 'City' one,
            // - and finally the 'City' output drives the chart
            //bind(countryPicker, regionPicker).
            //bind(regionPicker, cityPicker).
            bind(cityPicker, barChart).
            // Draw the dashboard
            draw(data);
    }

    google.setOnLoadCallback(drawVisualization);
</script>

<script type="text/javascript">
    google.load('visualization', '1', {packages: ['geomap']});

    function drawVisualization() {
        var data;
        data = google.visualization.arrayToDataTable([
            ['Postal Code', 'Invoices'],
            ['65202', 86],
            ['65201', 66],
            ['65203', 78],
            ['63101', 142],
            ['63110', 15],
            ['63199', 212]
        ]);

        var options = {};
        options['resolution'] = 'metros';
        options['region'] = 'US-MO';
        options['displayMode'] = 'markers';
        options['colors'] = ['gray', 'green', 'blue'];

        var geomap  = new google.visualization.GeoChart(document.getElementById('visualization2'));
        geomap.draw(data, options);
    }

    google.setOnLoadCallback(drawVisualization);
</script>

<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Postal Code', 'Invoices'],
            ['65202', 86],
            ['65201', 66],
            ['65203', 78],
            ['63101', 142],
            ['63110', 15],
            ['63199', 212]
        ]);

        var options = {
            title: 'Invoices by Zipcode'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
    }
    google.setOnLoadCallback(drawVisualization);
</script>

<script type="text/javascript">
    function drawVisualization() {
        // Create and populate the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Zipcode');
        data.addColumn('number', 'Invoices');
        data.addRows([
            ['65202', {f: '86'}],
            ['65201', {f: '66'}],
            ['65203', {f: '78'}],
            ['63110', {f: '142'}],
            ['63199', {f: '15'}],
            ['63101', {f: '212'}]
        ]);

        // Create and draw the visualization.
        var table = new google.visualization.Table(document.getElementById('chart_div10'));

        var formatter = new google.visualization.TableArrowFormat();
        formatter.format(data, 1); // Apply formatter to second column

        table.draw(data, {allowHtml: true, showRowNumber: true});
    }
    google.setOnLoadCallback(drawVisualization);
</script>


<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Time', 'Charges', 'Paid'],
            ['90 Days',  35000, 27000]
        ]);

        var options = {
            title: 'Company Performance',
            vAxis: {title: 'Days'},
            hAxis: {minValue: 0, format:'$ ###,###,###,###'}
        };

        var chart = new google.visualization.BarChart(document.getElementById('comparison'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Time', 'Charges', 'Paid'],
            ['180 Days', 89000, 64000]
        ]);

        var options = {
            title: 'Company Performance',
            vAxis: {title: 'Days'},
            hAxis: {minValue: 0, format:'$ ###,###,###,###'}
        };

        var chart = new google.visualization.BarChart(document.getElementById('comparison2'));
        chart.draw(data, options);
    }
</script>


<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Account Type', 'Charges', 'Paid'],
            ['Vaccinations', 89000, 64000],
            ['Dental', 89000, 64000],
            ['Exams/Wellness', 89000, 64000],
            ['Radiology', 89000, 64000],
            ['Grooming', 89000, 64000],
            ['Boarding', 89000, 64000],
            ['Surgery', 89000, 64000],
            ['Heartworm Prevention', 89000, 64000],
            ['Nutrition', 89000, 64000],
            ['Maintenance Drugs', 89000, 64000],
            ['180Days', 89000, 64000],
            ['180Days', 89000, 64000],
        ]);

        var options = {
            title: 'Company Performance',
            vAxis: {title: 'Days'},
            hAxis: {minValue: 0, format:'$ ###,###,###,###'}
        };

        var chart = new google.visualization.BarChart(document.getElementById('Chart_Number_4'));
        chart.draw(data, options);
    }
</script>


<script type='text/javascript'>
    google.load('visualization', '1', {packages:['gauge']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['90 Days', 77]
        ]);
        var options = {
            redFrom: 0, redTo: 70,
            yellowFrom:70, yellowTo: 90,
            greenFrom:90, greenTo: 100,
            minorTicks: 5,
            max: 100
        };
        // Create and draw the visualization.
        new google.visualization.Gauge(document.getElementById('gauge')).
            draw(data, options);
    }
</script>


<script type='text/javascript'>
    google.load('visualization', '1', {packages:['gauge']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['180 Days', 72]
        ]);
        var options = {
            redFrom: 0, redTo: 70,
            yellowFrom:70, yellowTo: 90,
            greenFrom:90, greenTo: 100,
            minorTicks: 5,
            max: 100
        };
        // Create and draw the visualization.
        new google.visualization.Gauge(document.getElementById('gauge2')).
            draw(data, options);
    }
</script>


<script type="text/javascript">
    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Account Type');
        data.addColumn('number', 'Charges');
        data.addColumn('number', 'Paid');
        data.addColumn('number', 'Percent Paid');
        data.addRows([
            ['Vaccinations', {v: 10000, f: '$89,000'}, {v: 10000, f: '$64,000'}, 72],
            ['Dental', {v: 10000, f: '$14,000'}, {v: 10000, f: '$12,000'},86],
            ['Exams/Wellness', {v: 10000, f: '$45,000'}, {v: 10000, f: '$30,000'},67],
            ['Lab', {v: 10000, f: '$7,000'}, {v: 10000, f: '$4,000'},57],
            ['Radiology', {v: 10000, f: '$16,000'}, {v: 10000, f: '$15,000'},84],
            ['Grooming', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'},100],
            ['Boarding', {v: 10000, f: '$4,000'}, {v: 10000, f: '$4,000'},100],
            ['Surgery', {v: 10000, f: '$13,000'}, {v: 10000, f: '$6,000'},46],
            ['Other', {v: 10000, f: '$35,000'}, {v: 10000, f: '$13,000'},37]
        ]);

        // Create and draw the visualization.
        var table = new google.visualization.Table(document.getElementById('table'));

        var formatter = new google.visualization.TableColorFormat();
        formatter.addRange(0, 70, 'white', 'red');
        formatter.addRange(70, 90, 'black', 'yellow');
        formatter.addRange(90, 101, 'white', 'green');
        formatter.format(data, 3); // Apply formatter to second column

        var next= new google.visualization.NumberFormat({suffix:'%'});
        next.format(data, 3);
        table.draw(data, {allowHtml: true, showRowNumber: true});
    }
    google.setOnLoadCallback(drawTable);
</script>


<script type="text/javascript">
    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Account Type');
        data.addColumn('number', 'Charges');
        data.addColumn('number', 'Paid');
        data.addColumn('number', 'Percent Paid');
        data.addRows([
            ['Vaccinations', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 14],
            ['Heartworm Prevention', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 76],
            ['Flea/Tick', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 27],
            ['Nutrition', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 100],
            ['Maintenance Drugs', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 84],
            ['Other', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 92]
        ]);

        // Create and draw the visualization.
        var table = new google.visualization.Table(document.getElementById('table2'));

        var formatter = new google.visualization.TableColorFormat();
        formatter.addRange(0, 70, 'white', 'red');
        formatter.addRange(70, 90, 'black', 'yellow');
        formatter.addRange(90, 101, 'white', 'green');
        formatter.format(data, 3); // Apply formatter to second column

        var next= new google.visualization.NumberFormat({suffix:'%'});
        next.format(data, 3);
        table.draw(data, {allowHtml: true, showRowNumber: true});
    }
    google.setOnLoadCallback(drawTable);
</script>


<script type="text/javascript">
    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Account Type');
        data.addColumn('number', 'Charges');
        data.addColumn('number', 'Paid');
        data.addColumn('number', 'Percent Paid');
        data.addRows([
            ['Vaccinations', {v: 10000, f: '$89,000'}, {v: 10000, f: '$64,000'}, 72],
            ['Dental', {v: 10000, f: '$14,000'}, {v: 10000, f: '$12,000'},86],
            ['Exams/Wellness', {v: 10000, f: '$45,000'}, {v: 10000, f: '$30,000'},67],
            ['Lab', {v: 10000, f: '$7,000'}, {v: 10000, f: '$4,000'},57],
            ['Radiology', {v: 10000, f: '$16,000'}, {v: 10000, f: '$15,000'},84],
            ['Grooming', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'},100],
            ['Boarding', {v: 10000, f: '$4,000'}, {v: 10000, f: '$4,000'},100],
            ['Surgery', {v: 10000, f: '$13,000'}, {v: 10000, f: '$6,000'},46],
            ['Other', {v: 10000, f: '$35,000'}, {v: 10000, f: '$13,000'},37]
        ]);

        // Create and draw the visualization.
        var table = new google.visualization.Table(document.getElementById('table3'));

        var formatter = new google.visualization.TableColorFormat();
        formatter.addRange(0, 70, 'white', 'red');
        formatter.addRange(70, 90, 'black', 'yellow');
        formatter.addRange(90, 101, 'white', 'green');
        formatter.format(data, 3); // Apply formatter to second column

        var next= new google.visualization.NumberFormat({suffix:'%'});
        next.format(data, 3);
        table.draw(data, {allowHtml: true, showRowNumber: true});
    }
    google.setOnLoadCallback(drawTable);
</script>


<script type="text/javascript">
    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Account Type');
        data.addColumn('number', 'Charges');
        data.addColumn('number', 'Paid');
        data.addColumn('number', 'Percent Paid');
        data.addRows([
            ['Vaccinations', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 14],
            ['Heartworm Prevention', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 76],
            ['Flea/Tick', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 27],
            ['Nutrition', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 100],
            ['Maintenance Drugs', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 84],
            ['Other', {v: 10000, f: '$10,000'}, {v: 10000, f: '$10,000'}, 92]
        ]);

        // Create and draw the visualization.
        var table = new google.visualization.Table(document.getElementById('table4'));

        var formatter = new google.visualization.TableColorFormat();
        formatter.addRange(0, 70, 'white', 'red');
        formatter.addRange(70, 90, 'black', 'yellow');
        formatter.addRange(90, 101, 'white', 'green');
        formatter.format(data, 3); // Apply formatter to second column

        var next= new google.visualization.NumberFormat({suffix:'%'});
        next.format(data, 3);
        table.draw(data, {allowHtml: true, showRowNumber: true});
    }
    google.setOnLoadCallback(drawTable);
</script>

<!--script type="text/javascript">
    function drawVisualization() {
        // Create and populate the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Department');
        data.addColumn('number', 'Revenues Change');
        data.addRows([
            ['Computer', {v: 12, f: '12.0%'}],
            ['Sports', {v: -7.3, f: '-7.3%'}],
            ['Toys', {v: 0, f: '0%'}],
            ['Electronics', {v: -2.1, f: '-2.1%'}],
            ['Food', {v: 22, f: '22.0%'}]
        ]);

        // Create and draw the visualization.
        var table = new google.visualization.Table(document.getElementById('chart55'));

        var formatter = new google.visualization.TableArrowFormat();
        formatter.format(data, 1); // Apply formatter to second column

        table.draw(data, {allowHtml: true, showRowNumber: true});
    }
    google.setOnLoadCallback(drawVisualization);
</script-->

<!--script type="text/javascript">
    function drawVisualization() {
// Prepare the data
        var data = google.visualization.arrayToDataTable([
            ['Hours', 'Income'],
            ['6 AM' , 0],
            ['7 AM' , 65],
            ['8 AM' , 98],
            ['9 AM' , 220],
            ['10 AM' , 128],
            ['11 AM' , 410],
            ['12 PM' , 0],
            ['1 PM' , 76],
            ['2 PM' , 115],
            ['3 PM' , 165],
            ['4 PM' , 85],
            ['5 PM' , 78],
            ['6 PM' , 223],
            ['7 PM' , 0],
            ['8 PM' , 0]
        ]);

// Define a NumberRangeFilter slider control for the 'Age' column.
        var slider = new google.visualization.ControlWrapper({
            'controlType': 'NumberRangeFilter',
            'containerId': 'control1',
            'options': {
                'filterColumnLabel': 'Income',
                'minValue': 0,
                'maxValue': 410
            }
        });

// Define a bar chart
        var barChart = new google.visualization.ChartWrapper({
            'chartType': 'BarChart',
            'containerId': 'chart1',
            'options': {
                'width': 600,
                'height': 300,
                'hAxis': {minValue: 0, showTextEvery: 2},
                'chartArea': {top: 20, right: 0, bottom: 0}
            }
        });

// Create the dashboard.
        var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard_output')).bind(slider, barChart).draw(data);
    }
    google.setOnLoadCallback(drawVisualization);
</script-->

<!--script type="text/javascript">
    function drawChart() {
        // Create and populate the data table.
        var option = {animation: {duration: 1000, easing: 'in'},
            vAxis: {title: "Income", minValue:0, maxValue:9000},
            hAxis: {title: "Day"}};
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'N');
        data.addColumn('number', 'Income');
        data.addRow(['Thu',  0]);
        data.addRow(['Fri',  0]);
        data.addRow(['Sat',  0]);
        data.addRow(['Mon',  0]);
        data.addRow(['Tue',  0]);
        data.addRow(['Wed',  0]);
        // Create and draw the visualization.
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, option);
        data.setValue(0, 1, 8456);

        data.setValue(1, 1, 9100);

        data.setValue(2, 1, 1200);

        data.setValue(3, 1, 4100);

        data.setValue(4, 1, 3895);

        data.setValue(5, 1, 6200);

        chart.draw(data, option);

    }

    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
</script>

<script type="text/javascript">
    function drawChart() {
        // Create and populate the data table.
        var option = {animation: {duration: 1000, easing: 'linear'},
            vAxis: {title: "Visits", minValue:0, maxValue:700},
            hAxis: {title: "Day"}};
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'N');
        data.addColumn('number', 'Canine');
        data.addColumn('number', 'Feline');
        data.addRow(['Thu',  0, 0]);
        data.addRow(['Fri',  0, 0]);
        data.addRow(['Sat',  0, 0]);
        data.addRow(['Mon',  0, 0]);
        data.addRow(['Tue',  0, 0]);
        data.addRow(['Wed',  0, 0]);
        // Create and draw the visualization.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, option);
        data.setValue(0, 1, 400);
        data.setValue(0, 2, 50);

        data.setValue(1, 1, 600);
        data.setValue(1, 2, 100);

        data.setValue(2, 1, 500);
        data.setValue(2, 2, 45);

        data.setValue(3, 1, 715);
        data.setValue(3, 2, 102);

        data.setValue(4, 1, 200);
        data.setValue(4, 2, 20);

        data.setValue(5, 1, 600);
        data.setValue(5, 2, 100);

        chart.draw(data, option);

    }

    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
</script>

<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Day', 'Canine', 'Feline'],
            ['Thu',  200,      44],
            ['Fri',  135,      22],
            ['Sat',  120,       13],
            ['Mon',  201,      17],
            ['Tue',  116,       7],
            ['Wed',  86,      4]
        ]);

        var options = {
            colors: ['red', 'blue'],
            hAxis: {title: 'Number of Visits'},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div15'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Types', 'Number Sent'],
            ['Emailed Reminder',     1800],
            ['Appointments',      600],
            ['Account Created',  425],
            ['Mailed Reminder', 2100],
            ['Newsletter',    650]
        ]);

        var options = {
            title: 'Outgoing Message Types'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    function drawChart() {
        // Create and populate the data table.
        var option = {title:"Income by Hour",
            animation: {duration: 1000, easing: 'linear'},
            vAxis: {title: "Income", minValue:0, maxValue:700},
            hAxis: {title: "Hour",showTextEvery: 2}};

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'N');
        data.addColumn('number', 'Income');
        data.addRow(['6 AM',  0]);
        data.addRow(['7 AM',  0]);
        data.addRow(['8 AM',  0]);
        data.addRow(['9 AM',  0]);
        data.addRow(['10 AM',  0]);
        data.addRow(['11 AM',  0]);
        data.addRow(['12 PM',  0]);
        data.addRow(['1 PM',  0]);
        data.addRow(['2 PM',  0]);
        data.addRow(['3 PM',  0]);
        data.addRow(['4 PM',  0]);
        data.addRow(['5 PM',  0]);
        data.addRow(['6 PM',  0]);
        data.addRow(['7 PM',  0]);
        data.addRow(['8 PM',  0]);

        // Create and draw the visualization.
        var chart = new google.visualization.LineChart(document.getElementById('chart_hourly_transaction'));
        chart.draw(data, option);
        data.setValue(0, 1, 400);
        data.setValue(1, 1, 600);
        data.setValue(2, 1, 500);
        data.setValue(3, 1, 715);
        data.setValue(4, 1, 200);
        data.setValue(5, 1, 600);

        data.setValue(6, 1, 400);
        data.setValue(7, 1, 600);
        data.setValue(8, 1, 500);
        data.setValue(9, 1, 715);
        data.setValue(10, 1, 200);
        data.setValue(11, 1, 600);
        data.setValue(12, 1, 200);
        data.setValue(13, 1, 600);
        data.setValue(14, 1, 200);
        chart.draw(data, option);

    }
    // Define a NumberRangeFilter slider control for the 'Age' column.
    var slider = new google.visualization.ControlWrapper({
        'controlType': 'NumberRangeFilter',
        'containerId': 'control1',
        'options': {
            'filterColumnLabel': 'Hour',
            'minValue': 6,
            'maxValue': 12
        }
    });

    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
</script-->



<!--script type="text/javascript" src="js/Chart.js"></script-->