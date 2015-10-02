<form action="{{ action('TaskController@store') }}" method="POST" class="form form-stacked">
    {!! csrf_field() !!}
    <div class="form-row">
        <label class="form-label" for="name">Name</label>

        <div class="form-controls">
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
    </div>
    <div class="form-row">
        <label class="form-label" for="start-date">Start Date</label>

        <div class="form-controls">
            <input type="date" class="form-control" id="start-date">
        </div>
    </div>
    <div class="form-row">
        <label class="form-label" for="end-date">End Date</label>

        <div class="form-controls">
            <input type="date" class="form-control" id="end-date">
        </div>
    </div>
    <div class="form-row">
        <label class="form-label" for="group">Group</label>

        <div class="form-controls">
            <select name="group">
                <?php
                $groups = \App\Group::all();
                ?>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-controls">
            <button type="submit" class="button button-primary">Submit</button>
        </div>
    </div>
</form>