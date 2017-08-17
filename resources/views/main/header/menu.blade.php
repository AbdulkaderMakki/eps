
<aside class="left-off-canvas-menu" style="height: 671px;">
    <ul class="off-canvas-list">
        <li><label>DashBoard Menu</label></li>

        {{--Here You can include all menus by your order--}}
        {{------------------------------------------------}}
        {{--admin menu--}}
        @include('admin.menu')

        {{-------------------------------------------------}}
        {{--Logout--}}
        <li class="last"><a href="{{route('logout')}}"><span>Log Out</span></a>
        </li>

    </ul>
</aside>