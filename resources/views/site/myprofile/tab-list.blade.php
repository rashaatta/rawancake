<div class="col-lg-4 col-12">
    <ul class="my-account-tab-list nav">
        <li><a href="#dashboad" class="active" data-bs-toggle="tab"><i class="lastudioicon-home-2"></i>@langucw('dashboard')</a></li>
        <li><a href="#orders" data-bs-toggle="tab"><i class="dlicon files_notebook"></i>@langucw('orders') </a></li>
        <li><a href="#referral" data-bs-toggle="tab"><i class="dlicon arrows-1_cloud-download-93"></i>@langucw('the referral')</a></li>
        <li><a href="#points" data-bs-toggle="tab"><i class="dlicon location_map-big"></i>@langucw('points') </a></li>
        <li><a href="#user-occasion" data-bs-toggle="tab"><i class="dlicon location_map-big"></i> @langucw('user-occasion')</a></li>
        <li><a href="#account-info" data-bs-toggle="tab"><i class="dlicon users_single-01"></i> Account Details</a></li>
        <li><form id="logout-form" method="POST" action="{{ route('logout') }}">@csrf<a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dlicon arrows-1_log-out">@langucw('Logout')</a></form></li>
    </ul>
</div>
