$(document).ready(function(){
    $(".delete").click(function(){
        if(!confirm("Ви впевнені, що хочете видалити елемент?")) {
            alert('Операцію відмінено')
            return false;
        }
    });

});