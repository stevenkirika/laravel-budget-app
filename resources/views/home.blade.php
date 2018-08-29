@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-custom-body ">
               

  <div class="panel-body">

  <div class="row">



    <div class="col-md-4">

          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-primary btn-lg" style="width: 100%;margin-bottom: 6px;" data-toggle="modal" id="revenueModal" data-target="#appModal">
          <h2><i class="fas fa-money-bill-wave"></i> REVENUE</h2>
          <h3>KES <span class="badge">  @if(count($budgets)>0)
            <?php $amount = 0; ?>
            @foreach($budgets as $budget)
              @if($budget->type == 1)
             <?php  $amount += $budget->amount; ?>
              @endif
            @endforeach
            {{$amount}}
            @endif  /-</span> <span class="pull-right">&raquo;</span></h3>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="appModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <form id="budget-form" method="post">
                <div id="modal-header" class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                 <div class="form-group">
                   <label for="description">Description</label>
                   <input type="text" id="description" name="description" class="form-control">
                 </div>
                 
                 <div class="form-group">
                   <label for="amount">Amount</label>
                   <input type="number" id="amount"  name="amount"  class="form-control">
                 </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}" >
                  <input type="hidden" name="type" id="type" value="" >
                  <input type="hidden" id="method">
                  {{ csrf_field() }}
                  <button type="button" class="btn btn-warning" data-dismiss="modal">CLOSE</button>
                  <button type="submit" id="submit_btn" class="btn btn-success"></button>
                </div>
              </form>
              </div>
              
            </div>
          </div>
    </div>

  <div class="col-md-4">

   <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-danger btn-lg" style="width: 100%;margin-bottom: 6px;" id="spendingModal" data-toggle="modal" data-target="#appModal">
          <h2><i class="fas fa-shopping-basket"></i> SPENDING</h2>
          <h3>KES <span class="badge"> 
            @if(count($budgets)>0)
            <?php $amount = 0; ?>
            @foreach($budgets as $budget)
              @if($budget->type == 0)
             <?php  $amount += $budget->amount; ?>
              @endif
            @endforeach
            {{$amount}}
            @endif 
           /-</span> <span class="pull-right">&raquo;</span></h3>
          </button>
        </div>

    <div class="col-md-4">

          <button type="button" class="btn btn-success btn-lg" style="width: 100%;" data-toggle="modal" data-target="#savingsModal">
          <h2><i class="fas fa-piggy-bank"></i> SAVINGS</h2>
          <h3>KES <span class="badge">    @if(count($budgets)>0)
            <?php $amount = $spending = 0; ?>
            @foreach($budgets as $budget)
              @if($budget->type == 0)
             <?php  $amount += $budget->amount; ?>
              @else
              <?php $spending += $budget->amount; ?>
              @endif
            @endforeach
            {{$amount-$spending}}
            @endif  /-</span> </h3>
          </button>               
                           
   </div>

                      </div>
  
                      <div class="row">
                          <div class="col-md-12">
                            <hr/>
                         @include('inc.messages')  
                           @if(count($budgets)>0)  
                              <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Dated</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                   @foreach($budgets as $budget)
                                   <tr class="
                                   @if($budget->type==1)
                                    warning
                                  @else
                                    danger
                                   @endif
                                   ">
                                     <td>{{$budget->created_at}}</td>
                                     <td id="description{{$budget->id}}" >{{$budget->description}}</td>
                                     <td id="amount{{$budget->id}}">{{$budget->amount}}</td>
                                     <td>
                                <form id="logout-form" action="/budgets/{{$budget->id}}" style="margin-top: -1px;margin-left: 4px;" method="POST"
                                class="pull-right" onsubmit="return confirm('Remove?')">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                </form>
                                      <a data-toggle="modal" data-target="#appModal" class="btn btn-primary btn-xs pull-right 
                                   @if($budget->type==1)
                                    edit_revenue
                                  @else
                                    edit_spending
                                   @endif
                                      " href="" rel="{{$budget->id}}"><i class="fa fa-edit"></i></a>
                                       
                                     </td>
                                   </tr>  
                                   @endforeach
                                </tbody>
                              </table>
                              @else
                                <div class="alert alert-info"><h3>Welcome to your budget app</h3> 
                                <p>Please proceed Revenue/Spending</p>  </div>
                            @endif   
                          </div>
                      </div>
             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
