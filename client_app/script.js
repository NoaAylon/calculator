$(document).ready(function() {
  $("#answer").click(function() {
    let num1 = parseInt($("input:text")[0].value);
    let num2 = parseInt($("input:text")[1].value);
    let num3 = parseInt($("input:text")[2].value);
    let method = $("input[name=method]:checked").val();
    let func = $("input[name=function]:checked").val();

    if (method == "GET") {
      console.log("inside get");
      $.ajax({
        url: `http://shenkar.html5-book.co.il/2018-2019/dcs/dev_27/service_calculator/index.php?num1=${num1}&num2=${num2}&num3=${num3}&func=${func}`,
        success: function(data) {
          $(".result")
            .text(`result: ${data.result}`)
            .css("color", "white");
          console.log("Return data: " + data.result);
        },
        error: function(error) {
          console.log(error);
          $(".result")
            .text(`error: Please choose function`)
            .css("color", "red");
        }
      });
    } else {
      $.ajax({
        url: `http://shenkar.html5-book.co.il/2018-2019/dcs/dev_27/service_calculator/index.php`,
        type: method,
        data: {
          num1,
          num2,
          num3,
          func
        },
        success: function(data) {
          $(".result")
            .text(`result: ${data.result}`)
            .css("color", "white");
          console.log("Return data: " + data.result);
        },
        error: function(error) {
          console.log(error);
          $(".result")
            .text(`error: Please choose function`)
            .css("color", "red");
        }
      });
    }
  });
});
