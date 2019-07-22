$(function(){
    $('.deleteButton').click(function(e){
        $id = $('.deleteButton').attr('id');
        console.log($id);
        e.preventDefault();
    });
});