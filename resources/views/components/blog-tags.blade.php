@props(['tagsCsv'])

@php
   $tags = explode(',',$tagsCsv);
@endphp

<style>
    /* Custom styling for tags list */
    .tags-list {
        list-style-type: none; /* Remove default list styles */
        padding: 0;
        margin: 0;
        display: flex; /* Use flexbox for layout */
        flex-wrap: wrap; /* Allow items to wrap to the next line if needed */
    }

    .tags-list li {
        margin-right: 10px; /* Add spacing between list items */
        margin-bottom: 10px; /* Add vertical spacing between rows */
    }

    .tags-list li a {
        text-decoration: none; /* Remove underline from hyperlinks */
        padding: 5px 10px; /* Add padding to make the clickable area larger */
        border-radius: 5px; /* Add rounded corners to the clickable area */
        background-color: #f0f0f0; /* Light gray background color */
        color: #333333; /* Dark gray text color */
        transition: background-color 0.3s; /* Smooth transition for hover effect */
    }

    .tags-list li a:hover {
        background-color: #e0e0e0; /* Darken the background color on hover */
    }
</style>

<ul class="tags-list">
    @foreach ($tags as $tag)
        <li>
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>
