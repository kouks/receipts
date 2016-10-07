{!! csrf_field() !!}

<header class="card-header">
    <p class="card-header-title">
        Add a new household
    </p>
</header>

<div class="card-content">
    <label class="label">Name</label>
    <p class="control">
        <input
            class="input{{ $errors->has('name') ? ' is-danger' : '' }}"
            name="name"
            placeholder="Enter the name of the household"
            required
            type="name"
            value="{{ old('name') }}"
        >
    </p>

    <p class="control">
        <button class="button is-primary">Add</button>
    </p>
</div>
