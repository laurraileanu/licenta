@include('layouts.web.stacks.styles')
@include('layouts.web.stacks.scripts')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

	<head>
	    @include('layouts.web.includes.head')
    </head>
    
	<body>

        <!-- header content -->
        <header id="header">
             
            @include('layouts.web.includes.header')
        
        </header>

        <!-- main content -->
        <div id="main">

            @yield('content')

        </div>

        <!-- footer content -->
        <footer>

            @include('layouts.web.includes.footer')

        </footer>
        <div id="modals">

            @stack('modals')

        </div>
	    <!-- scripts -->
	    <div id="scripts">

	    	<script src="{{ elixir('js/app.js') }}"></script>
            @stack('scripts')
            
        </div>
        
    </body>
    
</html>
