$(document).ready(function () {


    $("#answer").click(function () {
        console.log('clicked!!!');

        let num1 = parseInt($('input:text')[0].value);
        let num2 = parseInt($('input:text')[1].value);
        let num3 = parseInt($('input:text')[2].value);

        let method = $('input[name=method]:checked').val();
        let chosen_func = $('input[name=function]:checked').val();

        console.log(num1);
        console.log(num2);
        console.log(num3);
        console.log(method);
        console.log(chosen_func);

        if (method == 'GET') {
            console.log("inside get");
            $.ajax({
                url: `../service_calculator/index.php?num1=${num1}&num2=${num2}&num3=${num3}&func=${chosen_func}`,
                success: function (data) {
                    $(".result").text(`result: ${data.result}`);
                    console.log("Return data: " + data.result);
                }


            });

        } else {
            $.ajax({
                url: `../service_calculator/index.php`,
                type: method,
                data: {
                    num1: num1,
                    num2: num2,
                    num3: num3,
                    func: chosen_func
                },
                success: function (data) {
                    $(".result").text(`result: ${data.result}`);
                    console.log("Return data: " + data.result);
                }
            });

        }


    });

});