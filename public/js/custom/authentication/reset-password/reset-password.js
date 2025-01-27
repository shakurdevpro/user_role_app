"use strict";
var KTAuthResetPassword = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_password_reset_form")),
                (e = document.querySelector("#kt_password_reset_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                regexp: {
                                    regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                    message:
                                        "The value is not a valid email address",
                                },
                                notEmpty: {
                                    message: "Email address is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                e.addEventListener("click", function (r) {
                    r.preventDefault(),
                        i.validate().then(function (i) {
                            if ("Valid" == i) {
                                e.setAttribute("data-kt-indicator", "on");
                                e.disabled = !0;

                                // Préparer les données pour l'AJAX
                                const formData = new FormData(t);

                                // Appeler l'API back-end
                                fetch("/forgot-password", {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": document.querySelector(
                                            'meta[name="csrf-token"]'
                                        ).content,
                                    },
                                    body: formData,
                                })
                                    .then((response) => response.json())
                                    .then((data) => {
                                        e.removeAttribute(
                                            "data-kt-indicator"
                                        );
                                        e.disabled = !1;

                                        if (data.status === "success") {
                                            Swal.fire({
                                                text: data.message,
                                                icon: "success",
                                                buttonsStyling: !1,
                                                confirmButtonText:
                                                    "Ok, got it!",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            }).then(function (e) {
                                                if (e.isConfirmed) {
                                                    t.querySelector(
                                                        '[name="email"]'
                                                    ).value = "";
                                                    const redirectUrl =
                                                        t.getAttribute(
                                                            "data-kt-redirect-url"
                                                        );
                                                    if (redirectUrl) {
                                                        location.href =
                                                            redirectUrl;
                                                    }
                                                }
                                            });
                                        } else {
                                            Swal.fire({
                                                text: data.message,
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText:
                                                    "Ok, got it!",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            });
                                        }
                                    })
                                    .catch((error) => {
                                        console.error(error);
                                        e.removeAttribute(
                                            "data-kt-indicator"
                                        );
                                        e.disabled = !1;

                                        Swal.fire({
                                            text: "An error occurred. Please try again.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        });
                                    });
                            } else {
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            }
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAuthResetPassword.init();
});
