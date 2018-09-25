    (function ($) {
        var rules = {
            name: {
                notEmpty: {
                    message: "The name is required"
                },              
                stringLength: {
                    min: 3,
                    max: 120,
                    message: "The name length must be within 3 to 120."
                }
            },
            title: {
                notEmpty: {
                    message: "The title is required"
                },
                stringLength: {
                    min: 60,
                    max: 160,
                    message: "The title length must be within 60 to 160."
                }
            },
            email: {
                notEmpty: {
                    message: "The email field is required"
                },
                email: {
                    message: "The email must be valid!",
                }
            },
            password: {
                notEmpty: {
                    message: "The password field is required"
                },

            },
            password_confirmation: {
                match: {
                    message: "The password and confirm password must be match!",
                    field: 'password'
                }              
            },
            mobile: {
                notEmpty: {
                    message: "The Mobile no field is required"
                },
                mobile: {
                    message: "The Mobile no must be valid!",
                }
            },
            count: {
                count: {
                    type: 'checkbox', //here 2 types available like class and checkbox
                    min: 2,
                    massageDivId: 'your Message section id',
                    message: "The count field must be greter then 2!",
                }
            },
            remoteCheck: {
                remote: {
                    url: 'Your url will be here',
                    type: 'get', //your ajax form method and success return must be 1 for true validation
                    message: "The count field must be greter then 2!",
                }
            },
            type: {
                notEmpty: {
                    message: "The package type is required"
                },
                itsDependable: {
                    rules: {
                        1: {
                            'pricing_detail_1[price_type]': {
                                'notEmpty': {
                                    message: "The package price type is required"
                                }
                            },
                        },
                        2: {
                            'pricing_detail_2[basic_pricing_title]': {
                                'notEmpty': {
                                    message: "The package basic price title is required"
                                }
                            },
                        }
                    }

                }
            }

        };

        smValidator("createUser", rules, 1);
    })(jQuery);
