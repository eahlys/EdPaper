<!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @extends('layouts/default')

    @section('pagetitle') Search: {{ $query }} - EdPaper @endsection

    @section('navbar')
    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="/cat" class="nav-link">Categories</a></li>
    <li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
    <li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
    @endsection

    @section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-xs-11">
    			<div class="row">
    				<form method="GET" class="form" action="/search">
    					<div class="col-xs-9">
    						<input type="text" class="form-control" name="query" value="{{ $query }}">
    					</div>
    					<div class="col-xs-1">
    						<button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
    					</div>
            </form>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
         <tr>
          <th class="col-xs-2">Uploaded</th>
          <th class="col-xs-9">Title</th>
          <th class="col-xs-1"></th>
        </tr>
      </thead>
      @if (count($results) > 0)
      <tbody>	
       <tr>
        @foreach ($results as $doc)
        <td>{{ $doc->created_at }}</td>
        <td>
          @if (!is_null($doc->share)) <i class="fa fa-link"></i> @endif <a href="/doc/{{ $doc->id }}">{{ $doc->title }}</a>
          @foreach ($doc->categories()->get() as $cat)
          <a href="/cat/{{ $cat->id }}"><span class="badge badge-default">{{ $cat->title }}</span></a>
          @endforeach
        </td>
        <td>
         <a href="/doc/{{ $doc->id }}/view" target="_blank"><i class="fa fa-eye"></i></a>  
         <a href="/doc/{{ $doc->id }}/download"><i class="fa fa-download"></i></a>
       </td>
     </tr>
     @endforeach
   </tbody>
   @else
   <tbody>
     <tr class="text-center">
      <td></td>
      <td>
       <i>Nothing to see here</i>
     </td>
     <td></td>
   </tr>
 </tbody>
 @endif
</table>
<div class="col-sm-8 pull-right">
  {{ $results->links() }}
</div>
</div>
@endsection
