	<nav id="sidebar">
		<div class="p-4 pt-1">
					<div class="text-center mb-3">
						<a href="#" class="img logo rounded-circle mb-3" style="background-image: url({{ asset('admin/images/logo.jpg') }});"></a>
		  		         <p class="text-white">{{ Auth::user()->name }}</p>
		  		         {{-- <p class="text-white">{{ Auth::user()->email }}</p> --}}
					</div>
		  		
	        <ul class="list-unstyled components mb-5">
	        	<li class="{{ request()->is('admin/dashboard') ? 'active':'' }}">
				   <a class="text-white" style="font-size: 20px;" href="{{ route('dashboard') }}"><span > <i  class="fa fa-bars"></i> </span>Dashboard</a> 
	           
	            </li>
	         {{--  <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul>
	          </li> --}}
	          <li class="{{ request()->is('admin/brand/brand-list') ? 'active':'' }}">
	              <a href="{{ route('brand.brand-list') }}"><span > <i  class="fa fa-bars"></i> </span> Brand</a>
	          </li>
	          <li class="{{ request()->is('dashboard') ? 'active':'' }}">
	              <a href="#"><span > <i  class="fa fa-code"></i> </span> Category</a>
	          </li>
	          <li class="{{ request()->is('dashboard') ? 'active':'' }}">
	              <a href="#"><span > <i  class="fa fa-envelope"></i> </span> Post</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>
	          <li class="active">
              <a href="#">Portfolio</a>
	          </li>
	          <li>
              <a href="#">Contact</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved By <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Tesla Coder</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>
