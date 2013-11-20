
  var idCliente;

var autoCompliteAlbum={
  
    
    
    
    
     init: function(){
         autoCompliteAlbum.autocompliteAbum();
        
    },
            
        autocompliteAbum: function(){
    
    
    $(document).ready(function(){
            new Autocomplete("album", function() {
                this.setValue = function(album) {
                    $("#retornoAlbum").val(album);
                }
                if ( this.isModified  ){
                    this.setValue("");
                }
                if ( this.value.length < 1 && this.isNotClick ){
                    return ;
                }
                return "../action/autoCompliteAlbumAction.php?name=" + this.value;
            });

        });
        }
    
} ;
autoCompliteAlbum.init();


