@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      <div class="content">
                <div class="col-md-12">
                    
                       <table class="table table-striped table-dark">
                    <thead>
                        
                        <th>titre</th>
                        <th>text</th>
                        <th>image</th>
                       
                        
                       
                        
                        
                    </thead>   
                    @foreach($test as $value)
                    
                        <tr>
                        <td>{{$value->id}}  </td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->text}}</td>
                        <td><img  src="{{ URL('images/'.$value->image) }}" class="tm-people" alt="" height="70" width="70"></div></td>
                        <td>
                             @can('isAdmin')
                            <form action="{{ route('update', $value->id) }}" method="post">
                                 @csrf
                                 @method('PUT')
                                <select name="select" >
                                     <option value="{{$value->status}}">{{$value->status}}</option>
                                     <option value="Approved">Approved</option>
                                     <option value="denied">denied</option>
                                </select>
               
                                <button type="submit" name="submit" >Valider</button>
                            </form>
                        </td>
                        @else
                        <td>{{$value->status}}</td>

                      @endcan
                    @endforeach
                    
                </table>
             
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
