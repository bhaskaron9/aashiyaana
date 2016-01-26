var India = '<option selected="selected" value=""></option><option value="1100">1100</option>';

var Egypt = '<option selected="selected" value=""></option><option value="1301">1301</option>';

var China = '<option selected="selected" value=""></option><option value="3101">3101</option><option value="3102">3102</option><option value="3103">3103</option><option value="3104">3104</option><option value="3301">3301</option>';

var Phillipines = '<option selected="selected" value=""></option><option value="3201">3201</option>';

var UK = '<option selected="selected" value=""></option><option value="4101">4101</option><option value="Arista UK">Arista UK</option>';

var Poland = '<option selected="selected" value=""></option><option value="4301">4301</option>';

var Russia = '<option selected="selected" value=""></option><option value="4501">4501</option>';

var USA = '<option selected="selected" value=""></option><option value="2101">2101</option><option value="2102">2102</option><option value="Arista USA">Arista USA 2201</option>';

var Columbia = '<option selected="selected" value=""></option><option value="2601">2601</option>';

var Mexico = '<option selected="selected" value=""></option><option value="2402">2402</option>';
$(document).ready(function () {
    $("select#select_1").on('change', function () {
        if ($(this).val() == "India") {
            $("select#select_2").html(India);
        } else if ($(this).val() == "Egypt") {
            $("select#select_2").html(Egypt);
        } else if ($(this).val() == "China") {
            $("select#select_2").html(China);
        } else if ($(this).val() == "Phillipines") {
            $("select#select_2").html(Phillipines);
        }else if ($(this).val() == "UK") {
            $("select#select_2").html(UK);
        }else if ($(this).val() == "Poland") {
            $("select#select_2").html(Poland);
        }else if ($(this).val() == "Russia") {
            $("select#select_2").html(Russia);
        }else if ($(this).val() == "USA") {
            $("select#select_2").html(USA);
        }else if ($(this).val() == "Columbia") {
            $("select#select_2").html(Columbia);
        }else if ($(this).val() == "Mexico") {
            $("select#select_2").html(Mexico);
        }
    });
});