<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link href="/css/vendor.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Timeline</div>
    </div>
</div>
<div id="visualization"></div>

<div class="alerts">
    @include('alerts')
</div>

<div class="row">
    <div class="col-6-12">@include('forms/create-task')</div>
    <div class="col-6-12">@include('forms/create-group')</div>
</div>

<script type="text/javascript">

    // DOM element where the Timeline will be attached
    var container = document.getElementById('visualization');

    // Create a DataSet (allows two way data-binding)
    var groups = new vis.DataSet([
            @foreach($groups as $group)
                {
            id: {{ $group->id }}, content: '{{ $group->name }}', value: {{ $group->id }}
        },
        @endforeach()
    ]);

    console.log(groups);

    // create a dataset with items
    // note that months are zero-based in the JavaScript Date object, so month 3 is April
    var items = new vis.DataSet([
            @foreach($tasks as $task)
                {
            id: {{ $task->id }},
            group: {{ $task->group_id }},
            content: '{{ $task->name }}',
            start: new Date('{{ $task->date_start }}'),
            end: new Date('{{ $task->date_end }}')
        },
        @endforeach()
    ]);

    // Configuration for the Timeline
    // enable or disable all manipulation actions
    var options = {
        editable: {
            //add: true,         // add new items by double tapping
            remove: true       // delete an item by tapping the delete button top right
        },
        onRemove: function (item, callback) {

            $.ajax({
                url: "/task/" + item.id,
                type: 'DELETE',
                success: function (result) {
                    result = $.parseJSON(result);
                    console.log(result);
                    if (result.error) {
                        generateError(result.error);
                        hideAlert();
                    }
                    else{
                        items.remove(item.id);
                        generateMsg(result.msg);
                        hideAlert();
                    }
                }
            });
        }
    };

    // Create a Timeline
    var timeline = new vis.Timeline(container, items, groups, options);

    timeline.moveTo(Date());
</script>
</body>
</html>
