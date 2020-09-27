@extends('layouts.app')

@section('content')
<div class="container px-10 mx-auto">
    <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Popular Games</h2>
   <livewire:popular-games>
    <div class="flex flex-col my-10 lg:flex-row">
        <div class="w-full mr-0 lg:w-3/4 lg:mr-32">
            <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Recently Reviewed</h2>
           <livewire:recently-reviewed>
        </div>
        <div class="w-full most-anticipated lg:w-1/4">
            <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Most Anticipated</h2>
            <livewire:most-anticipated>
            <h2 class="mt-8 font-semibold tracking-wide text-blue-500 uppercase">Coming Soon</h2>
            <livewire:coming-soon>
        </div>
    </div>
</div> <!-- end container -->

@endsection
