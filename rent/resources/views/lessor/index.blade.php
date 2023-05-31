@extends('layout.master')

@section('content')
<style>
    .profile {
        margin-top: 20px;
        margin-bottom: 20px;

        /* box-shadow: 5px 10px #999; */
        border: 1px solid gray;
    }

    .profile h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .profile p {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .profile img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .properties {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 1px solid gray;

    }

    .properties h3 {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .properties ul {
        list-style-type: none;
        padding-left: 0;
    }

    .properties li {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .no-properties {
        color: #999;
        font-style: italic;
    }

    .modal-dialog {
        max-width: 400px;
        margin: 1.75rem auto;
    }

    .modal-content {
        padding: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 profile">
            <img src="{{ $lessor->image }}" alt="User Image">
            <h2>{{ $lessor->name }}</h2>
            <p>Email: {{ $lessor->email }}</p>
            <!-- Add more fields as needed -->
            <a href="#" data-toggle="modal" data-target="#editProfileModal">Edit Profile</a>
        </div>
        <div class="col-md-6 properties">
            {{-- <a href="{{ route('property.create') }}">Add New Property</a> --}}

            <h3>Properties</h3>
            @if ($properties->isEmpty())
            <p class="no-properties">You have no properties.</p>
            @else
            <ul>
                @foreach($properties as $property)
                <li>{{ $property->product_name }}</li>
                <!-- Display more property details as needed -->
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('lessor.update', ['lessor' => $lessor->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $lessor->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $lessor->email }}">
                </div>
                <!-- Add more form fields as needed -->
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
