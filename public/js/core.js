"use strict";
var Services = function (r) {
    return {
        is: function (e) {
            return 0 != r(e).length
        }
    }
}(jQuery);

function messageSearch(e, r) {
    var t, a, u;
    for (a = document.getElementsByClassName("customer_detail__content"), t = 0; t < a.length; t++) a[t].style.display = "none";
    for (u = document.getElementsByClassName("customer_detail__tablinks"), t = 0; t < u.length; t++) u[t].className = u[t].className.replace(" active", "");
    document.getElementById(r).style.display = "block", e.currentTarget.className += " active"
}
jQuery(document).ready(function (e) {
    e(window).on("load", function () {}), e.validator.addMethod("regex", function (e, r, t) {
        return this.optional(r) || t.test(e)
    }, "Please check your input."), e(".myValidation").validate({
        rules: {
            fullname: {
                required: !0,
                maxlength: 100,
                regex: /^[a-zA-Z]*$/
            },
            email: {
                required: !0,
                maxlength: 50,
                regex: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            },
            username: {
                required: !0,
                maxlength: 50,
                regex: /^[a-zA-Z]*$/
            },
            password: {
                required: !0,
                minlength: 6,
                maxlength: 25
            },
            confirm: {
                required: !0
            },
            phone: {
                required: !0,
                regex: /^\([0-9]{3}\)[0-9]{4}\-[0-9]{3}$/
            },
            date: {
                required: !0
            },
            address: {
                required: !0
            }
        },
        messages: {
            fullname: {
                required: "* Full name must be fill out",
                maxlength: jQuery.validator.format("* The fullname must be not over 100 characters"),
                regex: "* The fullname must be in correct format"
            },
            email: {
                required: "* Full name must be fill out",
                maxlength: jQuery.validator.format("* The fullname must be not over 50 characters"),
                regex: "* The Email must be in correct format"
            },
            username: {
                required: "* Full name must be fill out",
                maxlength: jQuery.validator.format("* The fullname must be not over 50 characters"),
                regex: "* The fullname must be in correct format"
            },
            password: {
                required: "* Full name must be fill out",
                minlength: jQuery.validator.format("* First name must be at least 6 characters"),
                maxlength: jQuery.validator.format("* The fullname must be not over 50 characters")
            },
            confirm: {
                required: "* Full name must be fill out"
            },
            phone: {
                required: "* Full name must be fill out",
                regex: "* The phone must be in correct format"
            },
            date: {
                required: "* Full name must be fill out"
            },
            address: {
                required: "* Full name must be fill out"
            }
        }
    }), e("#house_infor").validate({
        rules: {
            housename: {
                maxlength: 100,
                required: !0
            },
            note: {
                maxlength: 250
            },
            phone: {
                required: !0,
                maxlength: 13,
                regexp: /^\([0-9]{3}\)[0-9]{4}\-[0-9]{3}$/
            },
            address: {
                maxlength: 250,
                required: !0
            },
            bedroom: {
                number: !0,
                required: !0
            },
            bathroom: {
                required: !0,
                number: !0
            },
            siteArea: {
                required: !0,
                number: !0
            },
            grossArea: {
                required: !0,
                number: !0
            },
            price: {
                required: !0,
                number: !0
            },
            desc: {
                maxlength: 250
            },
            name2: {
                required: !0,
                maxlength: 100
            },
            agent: {
                required: !0,
                maxlength: 100
            },
            built: {
                required: !0,
                number: !0
            }
        },
        messages: {
            housename: {
                required: "Full name must be fill out",
                maxlength: jQuery.validator.format("The housename must be not over 100 characters")
            },
            note: {
                maxlength: jQuery.validator.format("The note must be not over 250 characters")
            },
            phone: {
                required: "Full name must be fill out",
                maxlength: jQuery.validator.format("The housename must be not over 13 characters"),
                regex: "The phone must be in correct format"
            },
            address: {
                maxlength: jQuery.validator.format("The housename must be not over 250 characters"),
                required: "Address must be fill out"
            },
            bedroom: {
                required: "Number bedroom must be fill out",
                number: "The number bedroom must be a number"
            },
            bathroom: {
                required: "Number bathroom must be fill out",
                number: "The number bathroom must be a number"
            },
            siteArea: {
                required: "Living Area must be fill out",
                number: "The Living Area must be a number"
            },
            grossArea: {
                required: "Lot Size must be fill out",
                number: "The Lot Size must be a number"
            },
            price: {
                required: "Price must be fill out",
                number: "The price must be a number"
            },
            desc: {
                maxlength: jQuery.validator.format("The description must be not over 250 characters")
            },
            name2: {
                required: "Brokerage must be fill out",
                maxlength: jQuery.validator.format("The brokerage must be not over 100 characters")
            },
            agent: {
                required: "Agent must be fill out",
                maxlength: jQuery.validator.format("The agent must be not over 100 characters")
            },
            built: {
                required: "Year built must be fill out",
                number: "The year built must be a number"
            }
        }
    })
});