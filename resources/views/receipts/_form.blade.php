{!! csrf_field() !!}

<header class="card-header">
    <p class="card-header-title">
        Add a new receipt
    </p>
</header>

<div class="card-content">
    <label class="label">Title</label>
    <p class="control">
        <input
            class="input{{ $errors->has('name') ? ' is-danger' : '' }}"
            name="name"
            placeholder="Enter the name of the receipt"
            required
            type="name"
            value="{{ old('name') }}"
        >
    </p>

    <label class="label">Description</label>
    <p class="control">
        <textarea
            class="input{{ $errors->has('description') ? ' is-invalid' : '' }}"
            name="description"
            placeholder="Enter some brief description"
            type="text"
            required
        >{{ old('description') }}</textarea>
    </p>

    <label class="label">Value</label>
    <p class="control has-addons">
        <a class="button is-dark">
            &pound;
        </a>
        <input
            class="input is-expanded{{ $errors->has('value') ? ' is-invalid' : '' }}"
            name="value"
            pattern="-?[0-9]*(.[0-9]+)?"
            type="text"
            value="{{ old('value') }}"
        >
        <a class="button is-dark">
            .00
        </a>
    </p>

    <label class="label">Issue against</label>
    <p class="control">
        @foreach ($household->users as $user)
            <p class="control">
                <label class="checkbox">
                    <input
                        name="against[]"
                        type="checkbox"
                        value="{{ $user->id }}"
                    >
                    {{ $user->name }}
                </label>
            </p>
        @endforeach
    </p>

    <p class="control">
        <button class="button is-primary">Add</button>
    </p>
</div>
