<div class="col-md-12">
    <div class="row">
        <div class="col-md-12 p-3  offset-md-1 shadow-lg complete-item">
            <ul class="list-group  connectedSortable" id="complete-item-drop">
              @if(!empty($activeTypes) && $activeTypes->count())
                @foreach($activeTypes as $key => $value)
                  <li class="list-group-item " item-id="{{ $value->key }}"> <img width="70" src="{{ asset($value->image) }}" alt=""> {{ strip_tags($value->title) }}</li>
                @endforeach
              @endif
            </ul>
        </div>
    </div>
</div>




@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#padding-item-drop, #complete-item-drop" ).sortable({
    connectWith: ".connectedSortable",
    opacity: 0.5,
  });
  $( ".connectedSortable" ).on( "sortupdate", function( event, ui ) {
      var pending = [];
      var accept = [];
      $("#padding-item-drop li").each(function( index ) {
        if($(this).attr('item-id')){
          pending[index] = $(this).attr('item-id');
        }
      });
      $("#complete-item-drop li").each(function( index ) {
        accept[index] = $(this).attr('item-id');
      });
      $.ajax({
          url: "{{ route('dashboard.order.homepagesectiontypes') }}",
          method: 'POST',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {pending:pending,accept:accept},
          success: function(data) {
            console.log('success');
          }
      });

  });
});
</script>
@endpush
