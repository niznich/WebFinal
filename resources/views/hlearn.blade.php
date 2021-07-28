<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for student') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
  <body>
  <x-nav-link :href="route('dashboard.learn')" :active="request()->routeIs('dashboard.learn')">
				<button type="button" class="btn btn-primary m-2">
                        Click Here to Exit
				</button>
				</x-nav-link>
  <div class="iframe-container">
  	<iframe src="https://www.youtube.com/embed/uaMjhpi12M&t?autoplay=0" width="560" height="315" frameborder="0"></iframe>
  </div>
  <div class="iframe-container">
  	<iframe src="https://www.youtube.com/embed/rLFGra2TiTE?autoplay=0" width="560" height="315" frameborder="0"></iframe>
  </div>
  <div class="iframe-container">
  	<iframe src="https://www.youtube.com/embed/P2C2gPqsmAc?autoplay=0" width="560" height="315" frameborder="0"></iframe>
  </div>

  </body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        </div>
    </div>
</div>

<style>

.iframe-container{
    height: 20em;
  display: flex;
  align-items: center;
  justify-content: center } 

</style>
</x-app-layout>
