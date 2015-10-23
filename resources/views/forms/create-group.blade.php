<form action="{{ action('GroupController@store') }}" method="POST" class="form form-stacked">
    {!! csrf_field() !!}
    <fieldset>
        <legend>Create a Group</legend>
        <div class="form-row">
            <label class="form-label" for="name">Name</label>

            <div class="form-controls">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-controls">
                <button type="submit" class="button button-primary">Submit</button>
            </div>
        </div>
        <input type="hidden" name="user_id"/>
    </fieldset>
</form>