
<div class="container">
    <h3> Welcome Admin : {{auth('admin')->user()->name}}</h3>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
    <button type="submit">Logout</button>
</form>

