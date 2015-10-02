<!DOCTYPE html>
<html>
    <head>
        <title>Timeline</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>

        <script src="/js/vendor.js"></script>
        <link href="/css/vendor.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Timeline</div>
            </div>
        </div>
        <div id="visualization"></div>


        @include('forms/create-task')
        @include('forms/create-group')

        <script type="text/javascript">
            // DOM element where the Timeline will be attached
            var container = document.getElementById('visualization');

            // Create a DataSet (allows two way data-binding)
            var groups = new vis.DataSet([
                {id: 0, content: 'First', value: 1},
                {id: 1, content: 'Third', value: 3},
                {id: 2, content: 'Second', value: 2}
            ]);

            // create a dataset with items
            // note that months are zero-based in the JavaScript Date object, so month 3 is April
            var items = new vis.DataSet([
                {id: 0, group: 0, content: 'item 0', start: new Date(2015, 3, 17), end: new Date(2015, 9, 21)},
                {id: 1, group: 0, content: 'item 1', start: new Date(2015, 3, 19), end: new Date(2015, 9, 20)},
                {id: 2, group: 1, content: 'item 2', start: new Date(2015, 3, 16), end: new Date(2015, 9, 24)},
                {id: 3, group: 1, content: 'item 3', start: new Date(2015, 3, 23), end: new Date(2015, 9, 24)},
                {id: 4, group: 1, content: 'item 4', start: new Date(2015, 3, 22), end: new Date(2015, 9, 26)},
                {id: 5, group: 2, content: 'item 5', start: new Date(2015, 3, 24), end: new Date(2015, 9, 27)}
            ]);

            // Configuration for the Timeline
            // enable or disable all manipulation actions
            var options = {
                editable: true       // true or false
            };

            // Create a Timeline
            var timeline = new vis.Timeline(container, items, groups, options);

            timeline.moveTo(Date());
        </script>
    </body>
</html>
