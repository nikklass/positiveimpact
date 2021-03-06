@extends('layouts.master')


@section('title')

    Edit USSD Event - {{ $ussdevent->name }}

@endsection


@section('css_header')

    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">

@endsection


@section('content')
    
    <div class="container-fluid">

      <!-- Title -->
       <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Edit USSD Event - {{ $ussdevent->name }}</h5>
          </div>
          <!-- Breadcrumb -->
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              {!! Breadcrumbs::render('ussd-events.edit', $ussdevent->id) !!}
          </div>
          <!-- /Breadcrumb -->
       </div>
       <!-- /Title -->

      <!-- Row -->
       <div class="table-struct full-width full-height">
          <div class="table-cell auth-form-wrap-inner">
             <div class="ml-auto mr-auto no-float">
                
                <div  class="col-sm-12 col-md-8 col-md-offset-2">

                  <div class="row">
                     <div class="col-sm-12 col-xs-12">
                        
                        <div class="panel panel-default card-view">
                           
                           <div class="panel-wrapper collapse in">
                              
                              <div class="panel-body">               

                                 <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">
                                        Edit USSD Event - {{ $ussdevent->name }}
                                    </h3>
                                 </div>   

                                 <hr>

                                 <div class="form-wrap">
                                   
                                    <form class="form-horizontal" method="POST" 
                                        action="{{ route('ussd-events.update', $ussdevent->id) }}"> 

                                       {{ method_field('PUT') }}
                                       {{ csrf_field() }}

                                       @if (Auth::user()->hasRole('superadministrator'))
                                       <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                                              
                                          <label for="company_id" class="col-sm-3 control-label">
                                             Company
                                             <span class="text-danger"> *</span>
                                          </label>
                                          <div class="col-sm-9">
                                            
                                             <select class="selectpicker form-control" 
                                                name="company_id" 
                                                data-style="form-control btn-default btn-outline"
                                                required>  

                                                @foreach ($companies as $company)
                                                <li class="mb-10">
                                                <option value="{{ $company->id }}"

                                          @if ($company->id == old('company_id', $ussdevent->company->id))
                                              selected="selected"
                                          @endif
                                                    >{{ $company->name }}
                                                    </option>
                                                </li>
                                                @endforeach
                                                
                                             </select>

                                             @if ($errors->has('company_id'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('company_id') }}</strong>
                                                  </span>
                                             @endif
                                          
                                          </div>

                                       </div>
                                       @else
                                          <input type="hidden" id="company_id" name="company_id"
                                                value="{{ $ussdevent->company->id }}">
                                       @endif


                                       <div  class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                              
                                          <label for="name" class="col-sm-3 control-label">
                                             Event Name
                                             <span class="text-danger"> *</span>
                                          </label>
                                          <div class="col-sm-9">
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                id="name" 
                                                name="name"
                                                value="{{ old('name', $ussdevent->name)}}"
                                                required autofocus>

                                             @if ($errors->has('name'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('name') }}</strong>
                                                  </span>
                                             @endif
                                          </div>

                                       </div>


                                       <div  class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                              
                                          <label for="amount" class="col-sm-3 control-label">
                                             Event Cost 
                                             <span class="text-danger"> *</span>
                                          </label>
                                          <div class="col-sm-9">
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                id="amount" 
                                                name="amount"
                                                value="{{ old('amount', $ussdevent->amount)}}"
                                                required 
                                                autofocus>

                                             @if ($errors->has('amount'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('amount') }}</strong>
                                                  </span>
                                             @endif
                                          </div>

                                       </div>

                                       <div  class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                              
                                          <label for="description" class="col-sm-3 control-label">
                                              Description
                                          </label>

                                          <div class="col-sm-9">

                                            <textarea 
                                                class="form-control" 
                                                rows="5"
                                                id="description" 
                                                name="description">{{ old('description', $ussdevent->description)}}
                                            </textarea>

                                             @if ($errors->has('description'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('description') }}</strong>
                                                  </span>
                                             @endif

                                          </div>

                                       </div>


                                       <div  class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                              
                                          <label for="start_date" class="col-sm-3 control-label">
                                              Start Date
                                          </label>

                                          <div class="col-sm-9">

                                            <div class='input-group date' id='start_date_group'>
                                                <input 
                                                    type='text' 
                                                    class="form-control" 
                                                    id='start_date'
                                                    name="start_at"
                                                    value="{{ old('start_at', formatDatePickerDate($ussdevent->start_at))}}"
                                                />
                                                <span class="input-group-addon">
                                                   <span class="fa fa-calendar"></span>
                                                </span>
                                             </div>

                                             @if ($errors->has('start_at'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('start_at') }}</strong>
                                                  </span>
                                             @endif

                                          </div>

                                       </div>


                                       <div  class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                              
                                          <label for="end_date" class="col-sm-3 control-label">
                                              End Date
                                          </label>

                                          <div class="col-sm-9">

                                            <div class='input-group date' id='end_date_group'>
                                                <input 
                                                    type='text' 
                                                    class="form-control" 
                                                    id='end_date'
                                                    name="end_at"
                                                    value="{{ old('end_at', formatDatePickerDate($ussdevent->end_at))}}" 
                                                />
                                                <span class="input-group-addon">
                                                   <span class="fa fa-calendar"></span>
                                                </span>
                                             </div>

                                             @if ($errors->has('end_at'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('end_at') }}</strong>
                                                  </span>
                                             @endif

                                          </div>

                                       </div>


                                       <br/>

                                       <div class="form-group">
                                          <div class="col-sm-3"></div>
                                          <div class="col-sm-9">
                                              <button 
                                                type="submit" 
                                                class="btn btn-lg btn-primary btn-block mr-10"
                                                 id="submit-btn">
                                                 Submit
                                              </button>
                                          </div>
                                       </div>

                                       <br/>

                                    </form>

                                 </div>

                              </div>

                           </div>

                        </div>   
                     </div>
                  </div>

                </div>
                
             </div>
          </div>
       </div>
       <!-- /Row --> 
        

    </div>
         

@endsection


@section('page_scripts')

  <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

  <!-- search scripts -->
  @include('layouts.searchScripts')
  <!-- /search scripts -->

@endsection
