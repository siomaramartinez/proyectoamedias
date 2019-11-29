
<h1>CREATE</h1>

<form action="{{ route('GruposA.store')}}" method="post" enctype="multipart/form-data" , files='true' value>
{{csrf_field()}}
@csrf
   <button class="btn btn-primary btn-block col-3" type="submit ">INSERT</button>

</form>
<form action="{{ route('GruposB.store')}}" method="post" enctype="multipart/form-data" , files='true' value>
{{csrf_field()}}
@csrf
   <button class="btn btn-primary btn-block col-3" type="submit ">INSERT B</button>

</form>


