<div class="">
  <input id="search">
  <input type="hidden" id="search-id" name="user_id">
  <p id="search-description"></p>
</div>

@push('styles')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
  #search-description {
    margin: 0;
    padding: 0;
  }
</style>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var searchables = {!! json_encode($searchableList) !!};
    $( "#search" ).autocomplete({
      source: function (request, response) {
        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        var array = $.grep(searchables, function (value) {
            return matcher.test(value.id) || matcher.test(value.name) || matcher.test(value.email);
        });
        response(array);
      },
      focus: function( event, ui ) {
        $( "#search" ).val( ui.item.name );
        return false;
      },
      select: function( event, ui ) {
        $( "#search" ).val( ui.item.name );
        $( "#search-id" ).val( ui.item.id );
        $( "#search-description" ).html( ui.item.email );
        return false;
      }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.name + "<br>" + item.email + "</div>" )
        .appendTo( ul );
    };

  } );
  </script>
@endpush
