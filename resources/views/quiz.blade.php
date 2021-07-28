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
                    Quiz stuffs <br>
                </div>
            </div>
        </div>
    </div>

        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
<!DOCTYPE html>
<html>
<head>
	<title>Click here for the Quizes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
</head>
<body>
	<br>
	<h3>Click the Buttons to start your Quiz!</h3>
	<form method="post" action="#">
	<br><br>
	  <table class="table-bordered table-striped" width="50%">
		<thead>
		  <tr>
			<th class="text-center">No.</th>
			<th class="text-center">Subject</th>
			<th class="text-center"> Click Here to start</th>
		  </tr>
		</thead>
		<tbody>
        
                       
		 <tr>
			<td class="text-center">1</td>
			<td class="text-center">Math</td>
			<td class="text-center">
				<x-nav-link :href="route('dashboard.mquiz')" :active="request()->routeIs('dashboard.mquiz')">
				<button type="button" class="btn btn-primary m-2">
                        Click Here
				</button>
				</x-nav-link>
                </td>
		 </tr>


		 <tr>
			<td class="text-center">2</td>
			<td class="text-center">Science</td>
			<td class="text-center">		
			<x-nav-link :href="route('dashboard.squiz')" :active="request()->routeIs('dashboard.squiz')">
			<button type="button" class="btn btn-primary m-2">
                        Click Here
				</button>
				</x-nav-link>
                </td>
		 </tr>
         <tr>
			<td class="text-center">3</td>
			<td class="text-center">History</td>
			<td class="text-center">			<x-nav-link :href="route('dashboard.hquiz')" :active="request()->routeIs('dashboard.hquiz')">
			<button type="button" class="btn btn-primary m-2">
                        Click Here
				</button>
				</x-nav-link>
			</td>
		 </tr>
		 <tr>
			<td class="text-center">4</td>
			<td class="text-center">Geography</td>
			<td class="text-center">			<x-nav-link :href="route('dashboard.gquiz')" :active="request()->routeIs('dashboard.gquiz')">
			<button type="button" class="btn btn-primary m-2">
                        Click Here
				</button>
				</x-nav-link> </td>
		 </tr>
		</tbody>
			</table>
			<br>
		</form>
    	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
