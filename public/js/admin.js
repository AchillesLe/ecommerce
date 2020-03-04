$(document).ready(function(){
    
    
    if( $('#page-product').length > 0 ){
        $('#tbl-product').DataTable();
    }

    if( $('#page-category').length > 0 ){
        $('#tbl-category').DataTable();
    }
})