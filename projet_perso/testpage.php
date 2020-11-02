<style>
@media all and (min-width: 992px) {
	.navbar{ padding-top: 0; padding-bottom: 0; }
	.navbar .has-megamenu{position:static!important;}
	.navbar .megamenu{left:0; right:0; width:100%; padding:20px;  }
	.navbar .nav-link{ padding-top:1rem; padding-bottom:1rem;  }
}
</style>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
 <a class="navbar-brand" href="#">Brand</a>
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">

<ul class="navbar-nav">
	<li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>
	<li class="nav-item"><a class="nav-link" href="#"> About </a></li>
	<li class="nav-item"><a class="nav-link" href="#"> Services </a></li>
	<li class="nav-item dropdown has-megamenu">
	    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Mega menu  </a>
	    <div class="dropdown-menu megamenu">
		    
              This is content of megamenu. <br>
	       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat.
		        
            </div> <!-- dropdown-mega-menu.// -->
	</li>
</ul>
  </div> <!-- navbar-collapse.// -->
</nav>
<script>
// jQuery code
// Prevent closing from click inside dropdown
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});
</script>