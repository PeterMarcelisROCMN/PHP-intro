$(document).ready(function() {
    $(document).on('click', '.add-to-cart', function(event) {
        event.preventDefault();

        var formData = new FormData();
        formData.append('id', $(this).data('id'));
        formData.append('action', 'add');

        fetch('controller/cartController.php', {
            method: 'POST',
            body: formData,
        }).then(function(response){
            return response.text();
        }).then(function(data){
            $('#cart-items').html(data);
        }).catch(function(error){
            console.error(error);
        });
    });

    $(document).on('click', '.remove-from-cart', function(event) {
        event.preventDefault();

        var formData = new FormData();
        formData.append('id', $(this).data('id'));
        formData.append('action', 'remove');

        fetch('controller/cartController.php', {
            method: 'POST',
            body: formData,
        }).then(function(response){
            return response.text();
        }).then(function(data){
            $('#cart-items').html(data);
        }).catch(function(error){
            console.error(error);
        });
    });

    $(document).on('click', '.update-cart', function(event) {
        event.preventDefault();

        var formData = new FormData();
        formData.append('id', $(this).data('id'));
        formData.append('direction', $(this).data('direction'));
        formData.append('action', 'update');

        fetch('controller/cartController.php', {
            method: 'POST',
            body: formData,
        }).then(function(response){
            return response.text();
        }).then(function(data){
            $('#cart-items').html(data);
        }).catch(function(error){
            console.error(error);
        });
    });
});
