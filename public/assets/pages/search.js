(function ($) {
    $(document).on('submit', 'form.searchform', function (e) {
        //Stop default form behavior 
        e.preventDefault();

        //Get form data
        const formData = $(this).serialize();
        console.log(formData);

        //Ajax request
        $.ajax(
            'http://localhost/Collegelink/public/ajax/search_results.php',
            {
                type: "GET",
                dataType: "html",
                data: formData,
            }).done(function (result) {
                //Clear results container
                $('#search-results-container').html('');

                //Append results to container
                $('#search-results-container').append(result);

                //Push url state
                history.pushState({}, '', 'http://localhost/Collegelink/public/assets/list.php?' + formData);
            });


    });
})(jQuery);