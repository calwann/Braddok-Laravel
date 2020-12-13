$(document).ready(function() {
    // Initialize and configure Materilize JS/JQuery functions

    $(".sidenav").sidenav();
    $(".parallax").parallax();
    $(".modal").modal();
    $(".dropdown-trigger").dropdown();
    $("select").formSelect();
    $(".collapsible").collapsible();
    $(".tooltipped").tooltip();
    $("input.counter, textarea.counter").characterCounter();
    $(".tabs").tabs();
    $(".tap-target").tapTarget();
    $(".datepicker").datepicker({
        format: "dd/mm/yyyy",
        showClearBtn: true,
        i18n: {
            cancel: "Voltar",
            clear: "Limpar",
            done: "Enviar",
            months: [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            monthsShort: [
                "Jan",
                "Fev",
                "Mar",
                "Abr",
                "Mai",
                "Jun",
                "Jul",
                "Ago",
                "Set",
                "Out",
                "Nov",
                "Dez"
            ],
            weekdays: [
                "Domingo",
                "Segunda",
                "Terça",
                "Quarta",
                "Quinta",
                "Sexta",
                "Sábado"
            ],
            weekdaysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
            weekdaysAbbrev: ["D", "S", "T", "Q", "Q", "S", "S"]
        }
    });
    $(".timepicker").timepicker({
        showClearBtn: true,
        twelveHour: false,
        i18n: {
            cancel: "Voltar",
            clear: "Limpar",
            done: "Enviar"
        }
    });
    $(".nav-search-trigger").click(function() {
        if ($("#nav-search").hasClass("scale-out")) {
            $("#nav-search").removeClass("scale-out");
        } else {
            $("#nav-search").addClass("scale-out");
        }
    });

    // Manager responsivity Navbar, Sidenav and logos

    $(window)
        .resize(function() {
            if ($(window).width() <= 600) {
                $("#brand-logo").addClass("truncate");
                $("#nav-wrapper").removeClass("container");
            } else {
                $("#brand-logo").removeClass("truncate");
                $("#nav-wrapper").addClass("container");
            }
        })
        .resize();

    $(window)
        .resize(function() {
            if ($(window).width() > 992) {
                $("#sidenav-mobile-div").hide();
            } else {
                $("#sidenav-mobile-div").show();
            }
        })
        .resize();

    $(window)
        .resize(function() {
            if ($(window).width() <= 1400) {
                $(".nav-items").hide();
                $(".li-nav-items").css("width", "54px");
            } else {
                $(".nav-items").show();
                $(".li-nav-items").css("width", "auto");
            }
        })
        .resize();

    // Manager SideNav for desktop

    if (
        window.location.href.indexOf("/login") == -1 &&
        window.location.href.indexOf("/register/") == -1 &&
        window.location.href.indexOf("/password") == -1 &&
        window.location.href.indexOf("/home") == -1 &&
        window.location.href.indexOf("/birthday") == -1
    ) {
        $(document).ready(function() {
            $("#mobile-demo").addClass("sidenav-fixed");
            $(window)
                .resize(function() {
                    if ($(window).width() < 992) {
                        $("header, main, footer").css("padding-left", "0px");
                        $("#mobile-demo").css("transform", "translateX(-105%)");
                    } else {
                        $("header, main, footer").css("padding-left", "260px");
                        $("#mobile-demo").css("transform", "none");
                    }
                })
                .resize();
        });
    } else {
        $(document).ready(function() {
            $("#mobile-demo").removeClass("sidenav-fixed");
        });
    }

    // Manager Footer

    if (
        window.location.href.indexOf("/login") == -1 &&
        window.location.href.indexOf("/register/") == -1 &&
        window.location.href.indexOf("/password") == -1
    ) {
        $("#footer-container").removeClass("hide");
    }

    // Validations with Jquery Mask

    var phoneOptions = {
        onKeyPress: function(phone, e, field, options) {
            var masks = ["(00) 00000-0000", "(00) 0000-00009"];
            var mask = phone.length < 15 ? masks[1] : masks[0];
            $(".phone-validation").mask(mask, options);
        }
    };
    $(".phone-validation").mask("(00) 00000-0000", phoneOptions);

    var phoneOptions2 = {
        onKeyPress: function(phone, e, field, options) {
            var masks = ["(00) 00000-0000", "(00) 0000-00009"];
            var mask = phone.length < 15 ? masks[1] : masks[0];
            $(".phone-validation-2").mask(mask, options);
        }
    };
    $(".phone-validation-2").mask("(00) 00000-0000", phoneOptions2);

    $(".date-validation").mask("T0/O0/T000", {
        translation: {
            T: {
                pattern: /[0-3]/,
                optional: false
            },
            O: {
                pattern: /[0-1]/,
                optional: false
            }
        }
    });
    $(".time-validation").mask("T0:S0", {
        translation: {
            T: {
                pattern: /[0-2]/,
                optional: false
            },
            S: {
                pattern: /[0-6]/,
                optional: false
            }
        }
    });
    $(".timeComplete-validation").mask("00:00:00");
    $(".cep-validation").mask("00000-000");
    $(".cpf-validation").mask("000.000.000-00", { reverse: true });
    $(".cnpj-validation").mask("00.000.000/0000-00", { reverse: true });
    $(".money-validation").mask("000.000.000.000.000,00", { reverse: true });
    $(".ipAddress-validation").mask("099.099.099.099");
    $(".percent-validation").mask("##0,00%", { reverse: true });

    // Manager Timepicker and Datepicker Icon to input

    $(".datepicker-done").on("click", function(event) {
        var dateVal = $(".datepicker").val();
        $(".datepicker-control").val(dateVal);
    });
    $(".datepicker-clear").on("click", function(event) {
        $(".datepicker-control").val("");
    });

    $(".timepicker-close").on("click", function(event) {
        var timeVal = $(".timepicker").val();
        $(".timepicker-control").val(timeVal);
    });
    $(".timepicker-clear").on("click", function(event) {
        $(".timepicker-control").val("");
    });
});
