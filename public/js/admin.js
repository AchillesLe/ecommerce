$(document).ready(function(){
    
    $('#tbl-products').DataTable();

    if( $('#page-category').length > 0 ){
        $('#tbl-categories').DataTable();
    }
})