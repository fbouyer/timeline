<form action="{{ action('GroupController@store') }}" method="POST">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name">
    </div>

    <input type="hidden" name="user_id"  />

    <div class="form-row">
        <div class="form-controls">
            <button type="submit" class="button button-primary">Submit</button>
        </div>
    </div>
</form>