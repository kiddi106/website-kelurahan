<div class="container-fluid">

	<form action="{{ $model->exists ? route('managequestion.update', ['managequestion' => $model->id]) : route('managequestion.store') }}"  method="POST" id="manage-question" enctype="multipart/form-data">
		@if ($model->exists)
		<input type="hidden" name="_method" value="PUT">
		@endif
		@csrf
		<input type="hidden" value="{{ request()->get('id') }}" name="id_type">
		
		<div class="col-lg-12">
			<div class="row">
				<div class="col-sm-6 border-right">
						<input type="hidden" name="id" value="">
						<div class="form-group">
							<label for="" class="control-label">Question</label>
							<textarea name="soal" id="" cols="30" rows="4" class="form-control">{{$model->exists ? $model->soal : "" }}</textarea>
						</div>
						<div class="form-group">
							<div class="mb-3">
								<label for="fileupload" class="control-label">Put Images/Voice/Video</label>
								<input type="file" class="form-control" id="file_upload" name="file_upload" >
							</div>
							
						</div>
						{{-- <div class="form-group">
							<a href="{{ route('tes') }}"><button>Test</button></a>
						</div> --}}
						@if($model->exists)
						<div class="form-group">
							<label for="" class="control-label">Question Answer Type</label>
						
							<select name="type" id="type" onchange="" class="custom-select custom-select-sm" >
								<option value="radio_opt" {{$model->jawabans[0]->tipe_jawaban_id == 1 ? 'selected':'' }}>Single Answer/Radio Button</option>
								<option value="check_opt" {{$model->jawabans[0]->tipe_jawaban_id == 2  ? 'selected':'' }}>Multiple Answer/Check Boxes</option>
								{{-- <option value="textfield_s" {{ $model->jawabans[0]->tipe_jawaban_id ==  'textfield_s' ? 'selected':'' }}>Text Field/ Text Area</option> --}}
							</select>
						</div>
						@else
						<div class="form-group">
							<label for="" class="control-label">Question Answer Type</label>
							<select name="type" id="type" onchange="" class="custom-select custom-select-sm" >
                                
								<option value="0" disabled="" selected="">Please Select here</option>
                                
								
								<option value="radio_opt" {{ isset($model->tipe) && $model->tipe == 'radio_opt' ? 'selected':'' }}>Single Answer/Radio Button</option>
								<option value="check_opt" {{ isset($model->tipe) && $model->tipe == 'check_opt'  ? 'selected':'' }}>Multiple Answer/Check Boxes</option>
								{{-- <option value="textfield_s" {{ isset($model->tipe) && $model->tipe == 'textfield_s' ? 'selected':'' }}>Text Field/ Text Area</option> --}}
							</select>
						</div>
						@endif
						
				</div>
				<div class="col-sm-6">
					<b>Preview</b>
					<div class="preview">
						@if (!isset($model->tipesoals->id))
						<center><b>Select Question Answer type first.</b></center>
                            
                        @endif
						@if (isset($model->id))
                            <div class="callout callout-info">
                            @if ($model->tipe !='textfield_s')
                                {{ $model->tipe =='radio_opt' ? 'radio': 'checkbox'; }}
                                <table width="100%" class="table">
                                    <colgroup>
                                        <col width="10%">
                                        <col width="80%">
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="">
                                            <th class="text-center"></th>
  
                                            <th class="text-center">
                                                <label for="" class="control-label">Label</label>
                                            </th>
                                            <th class="text-center"></th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                          <tr class="">
                                               <td class="text-center">
                                                   <div class="icheck-primary d-inline" data-count = ''>
                                                     <input type="{{ $model->tipe }}" id="{{ $model->tipe }}Primary" name="{{ $model->tipe }}[]" checked="">
                                                     <label for="Primary">
                                                     </label>
                                                 </div>
                                               </td>
     
                                               <td class="text-center">
                                                   <input type="text" class="form-control form-control-sm check_inp"  name="label[]" value="">
                                               </td>
                                               <td class="text-center"></td>
                                          </tr>
                                       
                                       
                                       
  
                                   </tbody>
                                </table>
                                <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-sm btn-flat btn-default" type="button" onclick="{{ $model->tipe }}($(this))"><i class="fa fa-plus"></i> Add</button>
                                </div>
                                </div>
                              </div>
                          </div>
                            @else
                            <textarea name="t" id="" cols="30" rows="10" class="form-control" disabled="" placeholder="Write Something here..."></textarea>
                            @endif
                       @endif
	
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer" id="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary" id="modal-btn-save1">Save changes</button>
		</div>

	</form>
</div>
<div id="check_opt_clone"  style="display: none">
	<div class="callout callout-info">
      <table width="100%" class="table">
      	<colgroup>
      		<col width="10%">
      		<col width="80%">
      		<col width="10%">
      	</colgroup>
      	<thead>
	      	<tr class="">
		      	<th class="text-center"></th>

		      	<th class="text-center">
		      		<label for="" class="control-label">Label</label>
		      	</th>
		      	<th class="text-center"></th>
	     	</tr>
     	</thead>
     	<tbody>
     		<tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '1'>
			        	<input type="checkbox" id="checkboxPrimary1" name="benar[]" value="1" checked="">
			        	<label for="checkboxPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
		      		<input type="text" class="form-control form-control-sm check_inp" name="label[]">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
	     	<tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '2'>
			        	<input type="checkbox" id="checkboxPrimary2" name="benar[]" value="2" >
			        	<label for="checkboxPrimary2">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
		      		<input type="text" class="form-control form-control-sm check_inp" name="label[]">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
     	</tbody>
		 
					
				
      </table>
      <div class="row">
      <div class="col-sm-12 text-center">
      	<button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_check($(this))"><i class="fa fa-plus"></i> Add</button>
      </div>
      </div>
    </div>
</div>
<div id="radio_opt_clone" style="display: none">
	<div class="callout callout-info">
      <table width="100%" class="table">
      	<colgroup>
      		<col width="10%">
      		<col width="80%">
      		<col width="10%">
      	</colgroup>
      	<thead>
	      	<tr class="">
		      	<th class="text-center"></th>

		      	<th class="text-center">
		      		<label for="" class="control-label">Label</label>
		      	</th>
		      	<th class="text-center"></th>
	     	</tr>
     	</thead>
     	<tbody>
     		<tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '1'>
			        	<input type="radio" id="radioPrimary1" name="benar[]" value="1" checked="">
			        	<label for="radioPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
		      		<input type="text" class="form-control form-control-sm check_inp"  name="label[]">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
	     	<tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '2'>
			        	<input type="radio" id="radioPrimary2" name="benar[]" value="2" >
			        	<label for="radioPrimary2">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
		      		<input type="text" class="form-control form-control-sm check_inp"  name="label[]">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
     	</tbody>
      </table>
      <div class="row">
      <div class="col-sm-12 text-center">
      	<button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_radio($(this))"><i class="fa fa-plus"></i> Add</button>
      </div>
      </div>
    </div>
</div>
<div id="textfield_s_clone" style="display: none">
	<div class="callout callout-info">
		<textarea name="frm_opt" id="" cols="30" rows="10" class="form-control" disabled=""  placeholder="Write Something here..."></textarea>
	</div>
</div>
<script>
	function new_check(_this){
		var tbody=_this.closest('.row').siblings('table').find('tbody')
		var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
			count++;
		console.log(count)
		var opt = '';
			opt +='<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "'+count+'"><input type="checkbox"  name="benar[]" value="'+count+'" id="checkboxPrimary'+count+'"><label for="checkboxPrimary'+count+'"> </label></div></td>';
			opt +='<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="label[]"></td>';
			opt +='<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()">x</a></td>';
		var tr = $('<tr></tr>')
		tr.append(opt)
		tbody.append(tr)
	}
	function new_radio(_this){
		var tbody=_this.closest('.row').siblings('table').find('tbody')
		var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
			count++;
		console.log(count)
		var opt = '';
			opt +='<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "'+count+'"><input  name="benar[]" value="'+count+'" type="radio" id="radioPrimary'+count+'" name="radio"><label for="radioPrimary'+count+'"> </label></div></td>';
			opt +='<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="label[]"></td>';
			opt +='<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()">x</a></td>';
		var tr = $('<tr></tr>')
		tr.append(opt)
		tbody.append(tr)
	}
	function check_opt(){
		var check_opt_clone = $('#check_opt_clone').clone()
		$('.preview').html(check_opt_clone.html())
	}
	function radio_opt(){
		var radio_opt_clone = $('#radio_opt_clone').clone()
		$('.preview').html(radio_opt_clone.html())
	}
	function textfield_s(){
		var textfield_s_clone = $('#textfield_s_clone').clone()
		$('.preview').html(textfield_s_clone.html())
	}
	$('[name="type"]').change(function(){
		window[$(this).val()]()
	})

	$(() => {
		$("#modal-btn-save1").click(() => {

			const form = $("form#manage-question"),
				url = form.attr('action'),
				method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT',
				enctype = form.attr('enctype'),
				data = new FormData($("form#manage-question")[0]);

			// Jika Error dan sudah diisi
			form.find('.help-block').remove();
			form.find('.form-group').removeClass('has-error');

			console.log({
				url: url,
				method: method,
				enctype: enctype,
				data: data,});

			$.ajax({
				url: url,
				method: method,
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				success: function(response) {
					form.trigger('reset');
					$('#newkuis').modal('hide');

					swal({
						type: 'success',
						title: 'success',
						text: 'Data Has been saved!'
					}).then(() => {
                                window.location.reload();
                                
                            });
				},
				error: function(xhr) {
					var res = xhr.responseJSON;
					if ($.isEmptyObject(res) == false) {
						$.each(res.errors, function(key, value) {
							$('#' + key)
								.closest('.form-group')
								.addClass('has-error')
								.append('<span class="help-block"><strong>' + value + '</strong></span>')
						});
					}
				}
			})
		});
	});
</script>
