$(document).ready(function () {

    // Load more data
    $('.load-more').click(function () {
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        row = row + 3;

        if (row <= allcount) {
            $("#row").val(row);

            $.ajax({
                url: 'server.php',
                type: 'post',
                data: {
                    row: row
                },
                beforeSend: function () {
                    $(".load-more").text("Duke u ngarukuar...");
                },
                success: function (response) {

                    // Setting little delay while displaying new content
                    setTimeout(function () {
                        // appending posts after last post with class="post"
                        $(".post:last").after(response).show().fadeIn("slow");

                        var rowno = row + 3;

                        // checking row value is greater than allcount or not
                        if (rowno > allcount) {

                            // Change the text and background
                            $('.load-more').text("Mbylle");
                            $('.load-more').css("background", "darkorchid");
                        } else {
                            $(".load-more").text("Shiko më shumë");
                        }
                    }, 1000);


                }
            });
        } else {
            $('.load-more').text("Duke u ngarukuar...");

            // Setting little delay while removing contents
            setTimeout(function () {

                // When row is greater than allcount then remove all class='post' element after 3 element
                $('.post:nth-child(3)').nextAll('.post').remove().fadeIn("slow");

                // Reset the value of row
                $("#row").val(0);

                // Change the text and backgrounds
                $('.load-more').text("Shiko më shumë");
                $('.load-more').css("background", "#15a9ce");

            }, 2000);


        }

    });

});