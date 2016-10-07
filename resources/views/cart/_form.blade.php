{!! csrf_field() !!}

<header class="card-header">
    <p class="card-header-title">
        Add a new item to household cart
    </p>
</header>

<div class="card-content">
    <label class="label">Name</label>
    <p class="control">
        <input
            class="input{{ $errors->has('name') ? ' is-danger' : '' }}"
            name="name"
            placeholder="Enter the name of the item"
            required
            type="name"
            value="{{ old('name') }}"
        >
    </p>

    <label class="label">Priority</label>
    <p class="control">
        <span class="select">
            <select name="priority">
                <option value="3">High</option>
                <option value="2">Medium</option>
                <option value="1" selected>Low</option>
            </select>
        </span>
    </p>

    <p class="control">
        <button class="button is-primary">Add</button>
    </p>
</div>
