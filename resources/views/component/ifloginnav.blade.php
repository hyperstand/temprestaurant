<header id="header" id="home">
    <div class="container con-nav">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="{{url('dashboard')}}"> 
              <img src="{{asset('img/logo.png')}}" alt="" title="" />
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">                    

                <li><a href="{{url('dashboard/menu')}}">Food Menu</a></li>
                <li class="menu-has-children">
                        <a class="nav-prov">
                          <img src="https://yt3.ggpht.com/-FpoBOVwSiE0/AAAAAAAAAAI/AAAAAAAAAAA/Yf-SnwkfdQ4/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="">
                          <span>MyClark Youser</span>
                        </a>
                           <ul>
                            <li>
                              <a href="">Edit Profile</a> 
                             </li> 
                             <li>
                                <a href="">History</a> 
                            </li>
                            <li>
                                <a href="">Logout</a> 
                            </li>                    
                          </ul>
                </li>
            </ul>
          </nav>		    		
        </div>
    </div>
  </header>	