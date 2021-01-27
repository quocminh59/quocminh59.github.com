document.addEventListener("DOMContentLoaded",function(){
    var button1 = document.getElementById( 'btnChonFile' );
    console.log(button1);
    button1.onclick = function() {
      selectFileWithCKFinder( 'txtUrl' );
    };
    function selectFileWithCKFinder( elementId ) {
      CKFinder.popup( {
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function( finder ) {
          finder.on( 'files:choose', function( evt ) {
            var file = evt.data.files.first();
            var output = document.getElementById( elementId );
            output.value = file.getUrl();
          } );

          finder.on( 'file:choose:resizedImage', function( evt ) {
            var output = document.getElementById( elementId );
            output.value = evt.data.resizedUrl;
          } );
        }
      } );
    }

},false)