jQuery(document).ready(function ($) {
    (bsMain = $(".bs-offset-main")), (bsOverlay = $(".bs-canvas-overlay"));

    $('[data-toggle="canvas"][aria-expanded="false"]').on("click", function () {
        // BS Defaults
        if (window.matchMedia("(max-width: 567px)").matches) {
            var dev_width = "100%";
        } else {
            var dev_width = "600px";
        }
        var bsDefaults = {
            offset: false,
            overlay: true,
            width: dev_width,
        };

        var id = $(this).attr("data-id");

        $.ajax({
            method: "get",
            url: "http://localhost:8000/admin/view/application/" + id,
            headers: {
                "Ajax-Request": true,
            },
            beforeSend: function () {
                $("button#view-" + id).html(
                   "<div class='px-2'><span class='spinner-border text-white' style='width: 1rem; height: 1rem;' role='status'></span></div>"
                ).attr('disabled', 'disabled');
            },
            success: function (response) {
                $("button#view-" + id).text("View").attr('disabled', false);
                $("#name").text(
                    response.data.firstname +
                        " " +
                        response.data.middlename +
                        ", " +
                        response.data.lastname
                );

                $("#email").text(response.data.email);

                $("#phone").text(response.data.phone);

                $("#dob").text(response.data.dob);

                $("#address").text(response.data.address);

                $("#state").text(response.data.state);

                $("#city").text(response.data.city);

                $("#zip").text(response.data.zip);

                $("#employer").text(response.data.employer);

                $("#employment_type").text(response.data.employment_type);

                $("#income").text("$" + response.data.income);

                $("#ssn").text(response.data.ssn);

                $("#loan_amount").text("$" + response.data.loan_amount);

                $("#loan_purpose").text(response.data.loan_purpose);

                $("#loan_duration").text(response.data.loan_duration);

                // Right Bar Show
                var $this = $('[data-toggle="canvas"][aria-expanded="false"]');
                var canvas = $this.data("target"),
                    opts = $.extend({}, bsDefaults, $(canvas).data()),
                    prop = $(canvas).hasClass("bs-canvas-right")
                        ? "margin-right"
                        : "margin-left";
                if (opts.width === "100%") opts.offset = false;
                $(canvas).css("width", opts.width);
                if (opts.offset && bsMain.length) bsMain.css(prop, opts.width);
                $(canvas + " .bs-canvas-close").attr("aria-expanded", "true");
                $('[data-toggle="canvas"][data-target="' + canvas + '"]').attr(
                    "aria-expanded",
                    "true"
                );
                if (opts.overlay && bsOverlay.length)
                    bsOverlay.addClass("show");
                return false;
            },
            error: function () {
                $("button#view-" + id).text("View").attr('disbaled', false);
                toastr.options = {
                    progressBar: true,
                    showMethod: "slideUp",
                    showMethod: "slideDown",
                };
                toastr.error("Error: Something went wrong!");
            },
        });
    });

    $(".bs-canvas-close, .bs-canvas-overlay").on("click", function () {
        var canvas, aria;
        if ($(this).hasClass("bs-canvas-close")) {
            canvas = $(this).closest(".bs-canvas");
            aria = $(this).add(
                $(
                    '[data-toggle="canvas"][data-target="#' +
                        canvas.attr("id") +
                        '"]'
                )
            );
            if (bsMain.length)
                bsMain.css(
                    $(canvas).hasClass("bs-canvas-right")
                        ? "margin-right"
                        : "margin-left",
                    ""
                );
        } else {
            canvas = $(".bs-canvas");
            aria = $('.bs-canvas-close, [data-toggle="canvas"]');
            if (bsMain.length)
                bsMain.css({
                    "margin-left": "",
                    "margin-right": "",
                });
        }
        canvas.css("width", "");
        aria.attr("aria-expanded", "false");
        if (bsOverlay.length) bsOverlay.removeClass("show");
        return false;
    });
});
