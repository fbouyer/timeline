<form action="{{ action('TaskController@store') }}" method="POST" class="form form-stacked">
    {!! csrf_field() !!}
    <div class="form-row">
        <label class="form-label" for="name">Name</label>

        <div class="form-controls">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
    </div>
    <div class="form-row">
        <label class="form-label" for="date_start">Start Date</label>

        <div class="form-controls">
            <input type="date" class="form-control" id="date_start" name="date_start">
        </div>
    </div>
    <div class="form-row">
        <label class="form-label" for="date_end">End Date</label>

        <div class="form-controls">
            <input type="date" class="form-control" id="date_end" name="date_end">
        </div>
    </div>
    <div class="form-row">
        <label class="form-label" for="group">Group</label>

        <div class="form-controls">
            <select name="group_id">
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