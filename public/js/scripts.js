 $(function(){
  
  	$('#revenueModal').click(function(){
  		      $('#budget-form').attr('action', '/budgets');
              $('h4.modal-title').html('ADD REVENUE');
              $('#submit_btn').html('');//clear
              $('#submit_btn').html('ADD');
              $('#type').val(1);
              $('#modal-header').addClass('revenue');
              $('#modal-header').removeClass('spending');

  	});
  	$('#spendingModal').click(function(){
  		      $('#budget-form').attr('action', '/budgets');
              $('h4.modal-title').html('ADD SPENDING');
              $('#submit_btn').html('');//clear
              $('#submit_btn').html('ADD');
              $('#modal-header').removeClass('revenue');
              $('#modal-header').addClass('spending');
              $('#type').val(0);
  	});

  	$('.edit_revenue').click(function(){

  		      var id = $(this).attr('rel');

  		      $('#budget-form').attr('action', '/budgets/'+id+'');
  		      $('#method').attr('name', '_method');
  		      $('#method').val('PUT');

  		      var amount = $('#amount'+id+'').text();
  		      var description = $('#description'+id+'').text();

  		      $('#amount').val(''+amount+'');
  		      $('#description').val(''+description+'');

              $('h4.modal-title').html('UPDATE REVENUE');
              $('#submit_btn').html('');//clear
              $('#submit_btn').html('UPDATE');

              $('#modal-header').addClass('revenue');
              $('#modal-header').removeClass('spending');
              $('#type').val(1);
  	});

  	$('.edit_spending').click(function(){
  		      var id = $(this).attr('rel');
  		      var amount = $('#amount'+id+'').text();

			  $('#budget-form').attr('action', '/budgets/'+id+'');
			  $('#method').attr('name', '_method');
  		      $('#method').val('PUT');

  		      var description = $('#description'+id+'').text();

  		      $('#amount').val(''+amount+'');
  		      $('#description').val(''+description+'');

              $('h4.modal-title').html('UPDATE SPENDING');
              $('#submit_btn').html('');//clear
              $('#submit_btn').html('UPDATE');

              $('#modal-header').removeClass('revenue');
              $('#modal-header').addClass('spending');
              $('#type').val(0);
  	});


});