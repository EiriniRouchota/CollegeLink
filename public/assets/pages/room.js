(function ($) {
    $(document).on('submit', 'form.favoriteForm', function (e) {
        //Stop default form behavior 
        e.preventDefault();

        //Get form data
        const formData = $(this).serialize();
        // console.log(formData);

        //Ajax request
        $.ajax(
            'http://localhost/public/ajax/room_favorite.php',
            {
                type: "POST",
                dataType: "json",
                data: formData,
            }).done(function (result) {
                console.log(result);
                if (result.status) {
                    if (result.is_favorite) {
                        $('input[name=is_favorite').val(1);
                        $('.fas.fa-heart').addClass('loved');
                    }
                    else {
                        $('input[name=is_favorite').val(0);
                        $('.fas.fa-heart').removeClass('loved');
                    }
                } else {
                    console.log('error');
                    $('.fas.fa-heart').toggleClass('loved', !result.is_favorite);

                }

                // console.log(result);
            });
    });

    $(document).on('submit', 'form.reviewForm', function (e) {
        //Stop default form behavior 
        e.preventDefault();

        //Get form data
        const formData = $(this).serialize();
        console.log(formData);

        //Ajax request
        $.ajax(
            'http://localhost/public/ajax/room_review.php',
            {
                type: "POST",
                dataType: "html",
                data: formData,
            }).done(function (result) {
                // console.log(result);
                $('#room-reviews-container').append(result);

                // console.log(result);
                //Reset review form
                $('form.reviewForm').trigger('reset');
            });

    });
    $(document).on('submit', 'form.bookingForm', function (e) {
        //Stop default form behavior 
        e.preventDefault();

        //Get form data
        const formData = $(this).serialize();
        console.log(formData);

        //Ajax request
        $.ajax(
            'http://localhost/public/ajax/room_booking.php',
            {
                type: "POST",
                dataType: "html",
                data: formData,
            }).done(function (result) {
                console.log(result);
                // $("#submit-review").attr("disabled", false);
                $(".submit-review").text('Already Booked');
                $(".submit-review").attr("disabled", true);



            });

    });
})(jQuery);