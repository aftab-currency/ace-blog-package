<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ACE ADMIN <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listItem1"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list"></i>
            <span>Posts</span>
        </a>
        <div id="listItem1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
           
                <a class="collapse-item" href="{{url('ACE-Blog/posts')}}">All Posts</a>
                <a class="collapse-item" href="{{url('ACE-Blog/posts/add')}}">Add Post</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listItem2"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-comment"></i>
            <span>Comments</span>
        </a>
        <div id="listItem2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
           
                <a class="collapse-item" href="#">All Comments</a>
                <a class="collapse-item" href="#">Add Comment</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listItem3"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Categories</span>
        </a>
        <div id="listItem3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
           
                <a class="collapse-item" href="{{url('ACE-Blog/categories')}}">All Categories</a>
                <a class="collapse-item" href="{{url('ACE-Blog/categories/add')}}">Add Category</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listItem4"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-image"></i>
            <span>Images</span>
        </a>
        <div id="listItem4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
           
                <a class="collapse-item" href="#">All Images</a>
                <a class="collapse-item" href="#">Upload Image</a>
            </div>
        </div>
    </li>

</ul>
