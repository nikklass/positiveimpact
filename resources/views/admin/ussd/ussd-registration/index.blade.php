@extends('layouts.master')

@section('title')

    Manage USSD Registrations

@endsection

@section('css_header')

    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">

@endsection


@section('content')
    
    <div class="container-fluid">
        
		   <!-- Title -->
       <div class="row heading-bg">
          <div class="col-sm-6 col-xs-12">
          <h5 class="txt-dark">
                Manage USSD Registrations 
            </h5>
          </div>
          <!-- Breadcrumb -->
          <div class="col-sm-6 col-xs-12">
              {!! Breadcrumbs::render('ussd-registration') !!}
          </div>
          <!-- /Breadcrumb -->
       </div>
       <!-- /Title -->

       <!-- Row -->
        <div class="row mt-15">

               
               @include('layouts.partials.error_text')

               
               <div class="col-sm-12 col-xs-12">
                  
                  <div class="panel panel-default card-view panel-refresh">
                     
                       <div class="refresh-container">
                          <div class="la-anim-1"></div>
                       </div>
                       <div class="panel-heading panel-heading-dark">
                          
                          <div class="pull-left col-sm-3">

                              @if (count($ussdregistrations)) 
                                <div class="btn-group">
                                    <div class="dropdown">
                                       <button 
                                          aria-expanded="false" 
                                          data-toggle="dropdown" 
                                          class="btn btn-success dropdown-toggle " 
                                          type="button">
                                          Download 
                                          <span class="caret ml-10"></span>
                                       </button>
                                       <ul role="menu" class="dropdown-menu">

                                          <li>
                                            <a href="{{ route('excel.ussd-registration', 
                                                        ['xls', 
                                                          'start_date' => app('request')->input('start_date'),
                                                          'end_date' => app('request')->input('end_date'),
                                                          'paybills' => app('request')->input('paybills'),
                                                          'limit' => app('request')->input('limit'),
                                                        ]) 
                                                     }}"
                                            >As Excel</a>
                                          </li>
                                          <li><a href="{{ route('excel.ussd-registration', 'csv') }}">As CSV</a></li>
                                          <li><a href="{{ route('excel.ussd-registration', 'pdf') }}">As PDF</a></li>

                                       </ul>
                                    </div>
                                </div>
                              @endif

                          </div>

                          <div class="pull-right col-sm-9">
                            
                            <form action="{{ route('ussd-registration.index') }}">
                               <table class="table table-search">
                                 <tr>
                                    
                                    <td>
                                      <input type="hidden" value="1" name="search">
                                      
                                      <div class='input-group date' id='start_date_group'>
                                          <input 
                                              type='text' 
                                              class="form-control" 
                                              placeholder="Start Date" 
                                              id='start_date'
                                              name="start_date" 
                                              
                                              @if (app('request')->input('start_date'))
                                                  value="{{ app('request')->input('start_date') }}"
                                              @endif

                                          />
                                          <span class="input-group-addon">
                                             <span class="fa fa-calendar"></span>
                                          </span>
                                       </div>

                                    </td>

                                    <td>
                                      
                                      <div class='input-group date' id='end_date_group'>
                                          <input 
                                              type='text' 
                                              class="form-control" 
                                              placeholder="End Date" 
                                              id='end_date'
                                              name="end_date" 
                                              
                                              @if (app('request')->input('end_date'))
                                                  value="{{ app('request')->input('end_date') }}"
                                              @endif

                                          />
                                          <span class="input-group-addon">
                                             <span class="fa fa-calendar"></span>
                                          </span>
                                       </div>

                                    </td>

                                    <td>
                                      
                                        <a class="btn btn-default btn-icon-anim btn-circle" 
                                        data-toggle="tooltip" data-placement="top"
                                        title="Clear dates" id="clear_date">
                                          <i class="zmdi zmdi-chart-donut"></i>
                                        </a>

                                    </td>

                                    <td>

                                      <select class="selectpicker form-control" name="limit" 
                                        data-style="form-control btn-default btn-outline">

                                            <li class="mb-10">
                                              
                                              <option value="20"
                                                  @if (app('request')->input('limit') == 20)
                                                      selected="selected"
                                                  @endif
                                                >
                                                20
                                              </option>

                                            </li>

                                            <li class="mb-10">

                                              <option value="50"
                                                  @if (app('request')->input('limit') == 50)
                                                      selected="selected"
                                                  @endif
                                                >
                                                50
                                              </option>

                                            </li>

                                            <li class="mb-10">

                                              <option value="100"
                                                  @if (app('request')->input('limit') == 100)
                                                      selected="selected"
                                                  @endif
                                                >
                                                100
                                              </option>

                                            </li>

                                       </select>
                                      
                                    </td>
                                    
                                    
                                    <td>
                                      <button class="btn btn-primary">Filter</button>
                                    </td>
                                 </tr>
                               </table>
                            </form>
                             
                          </div>
                          <div class="clearfix"></div>

                       </div>


                     @if (!count($ussdregistrations)) 

                         <hr>

                         <div class="panel-heading panel-heading-dark">
                              <div class="alert alert-danger text-center">
                                  No records found
                              </div>
                         </div>

                     @else
                     
                         <div class="panel-wrapper collapse in">
                            <div class="panel-body row pa-0">
                               <div class="table-wrap">
                                  <div class="table-responsive">
                                     <table class="table table-hover mb-0">
                                        <thead>
                                           <tr>
                                              <th width="5%">id</th>
                                              <th width="15%">Name</th>
                                              <th width="10%">Phone</th>
                                              <th width="10%">Alternate Phone</th>
                                              <th width="10%">TSC No</th>
                                              <th width="10%">County</th>
                                              <th width="10%">Subjects</th>
                                              <th width="15%">Created At</th>
                                              <th width="5%">Actions</th>
                                           </tr>
                                        </thead>
                                        <tbody>

                                           @foreach ($ussdregistrations as $ussdreg)                                  
                                             <tr>

                                                <td>
                                                  <span class="txt-dark weight-500">
                                                    {{ $ussdreg->id }}
                                                  </span>
                                                </td>

                                                <td>
                                                  <span class="txt-dark weight-500">
                                                    {{ $ussdreg->name }} 
                                                  </span>
                                                </td>

                                                <td>
                                                  <span class="txt-dark weight-500">
                                                    {{ $ussdreg->phone }}
                                                  </span>
                                                </td>

                                                <td>
                                                  <span class="txt-dark weight-500">
                                                    {{ $ussdreg->alternate_phone }}
                                                  </span>
                                                </td>

                                                <td>
                                                  <span class="txt-dark weight-500">
                                                    {{ $ussdreg->tsc_no }}
                                                  </span>
                                                </td>

                                                <td>
                                                  <span class="txt-dark weight-500">
                                                    {{ $ussdreg->county }}
                                                  </span>
                                                </td>

                                                <td>
                                                  <span class="txt-dark weight-500">
                                                    {{ $ussdreg->subjects }}
                                                  </span>
                                                </td>

                                                <td>
                                                   <span class="txt-dark weight-500">
                                                    {{ formatFriendlyDate($ussdreg->created_at) }}
                                                   </span>
                                                </td>
                                                
                                                <td>

                                                   <a href="{{ route('ussd-registration.show', $ussdreg->id) }}" class="btn btn-info btn-sm btn-icon-anim btn-square">
                                                    <i class="zmdi zmdi-eye"></i> 
                                                   </a>

                                                </td>
                                             </tr>
                                           @endforeach 
                                           
                                        </tbody>
                                     </table>
                                  </div>
                               </div>
                               <hr>
                               <div class="text-center mb-20">
                                   
                                   {{ $ussdregistrations->links() }}

                               </div>   
                            </div>   
                         </div>

                     @endif

                  </div>

               </div>

        </div>   
        <!-- Row -->

    </div>
         

@endsection


@section('page_scripts')

  <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

  <!-- search scripts -->
  @include('layouts.searchScripts')
  <!-- /search scripts -->

@endsection



