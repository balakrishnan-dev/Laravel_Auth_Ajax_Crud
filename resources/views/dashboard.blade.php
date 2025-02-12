@if(session('login'))
    <script>
        alert("{{ session('login') }}");
    </script>
@endif

@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

@if(session('register'))
    <script>
        alert("{{ session('register') }}");
    </script>
@endif

@if(session('logout'))
    <script>
        alert("{{ session('logout') }}");
    </script>
@endif

    <h1>Student Dashboard</h1>
    <form id="FormId" action="{{url('/logout')}}" method="POST">
        @csrf
        <button type="submit" onclick="formLogout()">Logout</button>
        <script>
            function formLogout(){
                if(confirm('Do you want to logout?..')){
                    document.getElementById("FormId").submit();
                }
            }
        </script>
    </form>