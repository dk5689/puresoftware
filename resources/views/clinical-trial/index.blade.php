@extends('layouts.app')
@section('content')
<style type="text/css">
   .add-btn {
   line-height: 30px;
   width: 180px;
   font-size: 15px;
   margin-top: 1px;
   margin-right: 2px;
   position:absolute;
   top:15%;
   right:12%;
   }
   a {
   text-decoration:none;
   color:#000;
   }
   .completed {
   color:Green;
   }
   .not-completed {
   color:Red;
   }
   .error {
    color:red;
   }
   .actions{
    display:flex;
    padding:2px;
   }
</style>

@if($errors->has('title'))
    <div class="error">{{ $errors->first('title') }}</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
        <ul>
            @foreach (session('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @else
        {{ session('success') }}
    @endif
</div>
@endif


@if ($trials->count() > 0)
<table id="example" class="cell-border" style="width:100%">
   <thead>
      <tr>
         <td>Sr.No</td>
         <td>Name</td>
         <td>Date Of Birth</td>
         <td>Reason</td>
         <td>Actions</td>
      </tr>
   </thead>
   <tbody>
      @foreach ($trials as $key => $trial)
      <tr>
         <td>{{ $key + 1 }}</td>
         <td>{{ $trial->first_name }}</td>
         <td>{{ $trial->date_of_birth }}</td>
         <td>{{ $trial->result }}</td>
         <td class="actions">
            <a href="{{ url('clinical-trial/'.$trial->id . '/edit') }}" class="btn btn-outline-secondary" style="margin-left:1px;">  Edit </a>       
           <form action="{{ route('clinical-trial.destroy', $trial->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </form>


         </td>
      </tr>
      @endforeach
   </tbody>
</table>
@else
<p>No trials found.</p>
@endif
@endsection

