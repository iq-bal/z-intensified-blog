@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/edit_profile.css')}}">
<form action="/users/{{$user->id}}" method="POST" class="update-user-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name" class="update-label">Name</label>
        <input type="text" id="name" name="name" class="form-control update-input" value="{{$user->name}}" readonly>
    </div>
    <div class="form-group">
        <label for="email" class="update-label">Email</label>
        <input type="email" id="email" name="email" class="form-control update-input" value="{{$user->email}}" readonly>
    </div>
    <div class="form-group">
        <label for="interest" class="update-label">Interest</label>
        <input type="text" id="interest" name="interest" class="form-control update-input" value="{{$user->interest}}">
    </div>
    <div class="form-group">
        <label for="bio" class="update-label">Bio</label>
        <textarea id="bio" name="bio" class="form-control update-input">{{$user->bio}}</textarea>
    </div>
    <div class="form-group">
        <label for="facebook" class="update-label">Facebook</label>
        <input type="text" id="facebook" name="facebook" class="form-control update-input" value="{{$user->facebook}}">
    </div>
    <div class="form-group">
        <label for="instagram" class="update-label">Instagram</label>
        <input type="text" id="instagram" name="instagram" class="form-control update-input" value="{{$user->instagram}}">
    </div>
    <div class="form-group">
        <label for="twitter" class="update-label">Twitter</label>
        <input type="text" id="twitter" name="twitter" class="form-control update-input" value="{{$user->twitter}}">
    </div>
    <div class="form-group">
        <label for="dp_image" class="update-label">Profile Image</label>
        <input type="file" id="dp_image" name="dp_image" class="form-control update-input">
    </div>
    <div class="form-group">
        <label for="hobbies" class="update-label">Hobbies</label>
        <input type="text" id="hobbies" name="hobbies" class="form-control update-input" value="{{$user->hobbies}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection