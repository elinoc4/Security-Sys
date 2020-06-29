<div class="content">

    <form action="/result" method="POST">
        @csrf
        <input type="text" name="search" placeholder="Search Staff"/>
        <input type="submit" name="submit" placeholder="Search"/>
        <h3>
            @if(session()->has('message'))

                        {{session()->get('message')}}


                    @endif
            </h3>

    </form>


</div>
