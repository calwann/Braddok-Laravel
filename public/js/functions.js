$(document).ready(function() {
    $(".sidenav").sidenav();
    $(".parallax").parallax();
    $(".modal").modal();
    $(".dropdown-trigger").dropdown();
    $("select").formSelect();
    $(".collapsible").collapsible();
    $(".tooltipped").tooltip();
    $("input.counter, textarea.counter").characterCounter();
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
    $(".tabs").tabs();
    $(".nav-search-trigger").click(function() {
        if ($("#nav-search").hasClass("scale-out")) {
            $("#nav-search").removeClass("scale-out");
        } else {
            $("#nav-search").addClass("scale-out");
        }
    });

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

    if (
        window.location.href.indexOf("/login") == -1 &&
        window.location.href.indexOf("/register") == -1 &&
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

    if (
        window.location.href.indexOf("/login") == -1 &&
        window.location.href.indexOf("/register") == -1 &&
        window.location.href.indexOf("/password") == -1
    ) {
        $("#footer-container").removeClass("hide");
    }

    $("input.phone").attr(
        "pattern",
        "/^1dd(dd)?$|^0800 ?d{3} ?d{4}$|^((0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]d) ?|0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]d[ .-]?)?(9|9[ .-])?[2-9]d{3}[ .-]?d{4}$/gm"
    );
});

$("select.patent").append([
    $("<option>", {
        value: "",
        text: "",
        disabled: "",
        selected: ""
    }),
    $("<option>", {
        value: 1,
        text: "Sd EV"
    }),
    $("<option>", {
        value: 2,
        text: "Sd EP"
    }),
    $("<option>", {
        value: 3,
        text: "Cb"
    }),
    $("<option>", {
        value: 4,
        text: "3º Sgt"
    }),
    $("<option>", {
        value: 5,
        text: "2º Sgt"
    }),
    $("<option>", {
        value: 6,
        text: "1º Sgt"
    }),
    $("<option>", {
        value: 7,
        text: "S Ten"
    }),
    $("<option>", {
        value: 8,
        text: "Asp"
    }),
    $("<option>", {
        value: 9,
        text: "2º Ten"
    }),
    $("<option>", {
        value: 10,
        text: "1º Ten"
    }),
    $("<option>", {
        value: 11,
        text: "Cap"
    }),
    $("<option>", {
        value: 12,
        text: "Maj"
    }),
    $("<option>", {
        value: 13,
        text: "TC"
    }),
    $("<option>", {
        value: 14,
        text: "Cel"
    }),
    $("<option>", {
        value: 15,
        text: "Gen"
    })
]);

$("select.state-selected").append([
    $("<option>", {
        value: "",
        text: "",
        disabled: ""
    }),
    $("<option>", {
        value: "AC",
        text: "AC"
    }),
    $("<option>", {
        value: "AL",
        text: "AL"
    }),
    $("<option>", {
        value: "AP",
        text: "AP"
    }),
    $("<option>", {
        value: "AM",
        text: "AM"
    }),
    $("<option>", {
        value: "BA",
        text: "BA"
    }),
    $("<option>", {
        value: "CE",
        text: "CE"
    }),
    $("<option>", {
        value: "ES",
        text: "ES"
    }),
    $("<option>", {
        value: "GO",
        text: "GO"
    }),
    $("<option>", {
        value: "MA",
        text: "MA"
    }),
    $("<option>", {
        value: "MT",
        text: "MT"
    }),
    $("<option>", {
        value: "MS",
        text: "MS",
        selected: ""
    }),
    $("<option>", {
        value: "MG",
        text: "MG"
    }),
    $("<option>", {
        value: "PA",
        text: "PA"
    }),
    $("<option>", {
        value: "PB",
        text: "PB"
    }),
    $("<option>", {
        value: "PR",
        text: "PR"
    }),
    $("<option>", {
        value: "PE",
        text: "PE"
    }),
    $("<option>", {
        value: "PI",
        text: "PI"
    }),
    $("<option>", {
        value: "RJ",
        text: "RJ"
    }),
    $("<option>", {
        value: "RN",
        text: "RN"
    }),
    $("<option>", {
        value: "RS",
        text: "RS"
    }),
    $("<option>", {
        value: "RO",
        text: "RO"
    }),
    $("<option>", {
        value: "RR",
        text: "RR"
    }),
    $("<option>", {
        value: "SC",
        text: "SC"
    }),
    $("<option>", {
        value: "SP",
        text: "SP"
    }),
    $("<option>", {
        value: "SE",
        text: "SE"
    }),
    $("<option>", {
        value: "TO",
        text: "TO"
    }),
    $("<option>", {
        value: "DF",
        text: "DF"
    })
]);

window.onload = function() {
    var date = document.getElementsByClassName("date");
    //var date = document.getElementById('dateType');
    //debugger;

    function checkValue(str, max) {
        if (str.charAt(0) !== "0" || str == "00") {
            var num = parseInt(str);
            if (isNaN(num) || num <= 0 || num > max) num = 1;
            str =
                num > parseInt(max.toString().charAt(0)) &&
                num.toString().length == 1
                    ? "0" + num
                    : num.toString();
        }
        return str;
    }

    for (var i = 0; i < date.length; ++i) {
        date[i].addEventListener("input", function(e) {
            this.type = "text";
            var input = this.value;
            if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
            var values = input.split("/").map(function(v) {
                return v.replace(/\D/g, "");
            });
            if (values[0]) values[0] = checkValue(values[0], 12);
            if (values[1]) values[1] = checkValue(values[1], 31);
            var output = values.map(function(v, i) {
                return v.length == 2 && i < 2 ? v + " / " : v;
            });
            this.value = output.join("").substr(0, 14);
        });

        date[i].addEventListener("blur", function(e) {
            this.type = "text";
            var input = this.value;
            var values = input.split("/").map(function(v, i) {
                return v.replace(/\D/g, "");
            });
            var output = "";

            if (values.length == 3) {
                var year =
                    values[2].length !== 4
                        ? parseInt(values[2]) + 2000
                        : parseInt(values[2]);
                var month = parseInt(values[0]) - 1;
                var day = parseInt(values[1]);
                var d = new Date(year, month, day);
                if (!isNaN(d)) {
                    document.getElementById("result").innerText = d.toString();
                    var dates = [
                        d.getMonth() + 1,
                        d.getDate(),
                        d.getFullYear()
                    ];
                    output = dates
                        .map(function(v) {
                            v = v.toString();
                            return v.length == 1 ? "0" + v : v;
                        })
                        .join(" / ");
                }
            }
            this.value = output;
        });
    }
};
