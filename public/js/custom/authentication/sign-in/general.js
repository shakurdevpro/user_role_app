"use strict";
var KTSigninGeneral = (function () {
    var form, submitButton, validator;
    return {
        init: function () {
            form = document.querySelector("#kt_sign_in_form");
            submitButton = document.querySelector("#kt_sign_in_submit");

            console.log("Initializing form validation...");
            validator = FormValidation.formValidation(form, {
                fields: {
                    email: {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "The value is not a valid email address",
                            },
                            notEmpty: {
                                message: "Email address is required",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required",
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
            });

            submitButton.addEventListener("click", function (event) {
                event.preventDefault();

                console.log("Form submit clicked. Validating...");
                validator.validate().then(function (status) {
                    console.log("Validation status:", status);

                    if (status === "Valid") {
                        console.log("Form is valid, submitting data...");
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;

                        const formData = new FormData(form);
                        console.log("Form data prepared:", formData);

                        fetch(form.action, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                            },
                            body: formData,
                        })
                            .then((response) => {
                                console.log("Server response received:", response);
                                return response.json(); // Récupérer le JSON
                            })
                            .then((data) => {
                                console.log("Response data:", data);

                                submitButton.removeAttribute("data-kt-indicator");
                                submitButton.disabled = false;

                                if (data.success) {
                                    console.log("Login successful, redirecting...");
                                    Swal.fire({
                                        text: "You have successfully logged in!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    }).then(function () {
                                        window.location.href = data.redirect_url || "/";
                                    });
                                } else {
                                    console.log("Login failed:", data.message);
                                    Swal.fire({
                                        text: data.message || "Invalid credentials.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    });
                                }
                            })
                            .catch((error) => {
                                console.error("Error during the login process:", error);
                                Swal.fire({
                                    text: "An error occurred. Please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                                submitButton.removeAttribute("data-kt-indicator");
                                submitButton.disabled = false;
                            });
                    } else {
                        console.log("Form validation failed.");
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
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
    console.log("DOM content loaded, initializing sign-in script...");
    KTSigninGeneral.init();
});
