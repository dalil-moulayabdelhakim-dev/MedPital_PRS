<div id="sidebar">
    <div class="sidebar-header">
        <h3><img src="img/favicon.webp" class="img-fluid" /><span> Med Admin </span></h3>
    </div>
    <ul class="list-unstyled component m-0">
        <li class="active">
            <a href="#" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
        </li>

        <li class="dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">account_circle</i>Users profiles
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                <li><a href="{{ route('admin.profiles.page') }}">Admins</a></li>
                <li><a href="{{route('patient.profiles.page')}}">Patients </a></li>
                <li><a href="{{route('laboratorian.profiles.page')}}">Laboratorians</a></li>
            </ul>
        </li>


        <li class="dropdown">
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">assignment_returned</i>Join Requests
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                <li ><a class="list-item" href="{{route('patient.requests.page')}}"><p>Patients</p> <span class="badge">{{$settings['pat_req']}}</span></a></li>
                <li ><a class="list-item" href="{{route('laboratorian.requests.page')}}"><p>Laboratorians</p> <span class="badge">{{$settings['lab_req']}}</span></a></li>
            </ul>
        </li>



    </ul>
</div>
