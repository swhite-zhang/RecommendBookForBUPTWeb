window.onload = function () {
  var grade = ["--年级--", "大一", "大二"];
  var html2 = "";
  for (var i = 0; i < 3; i++) {
    html2 += "<option>" + grade[i] + "</option>";
  }
  document.getElementById("grade").innerHTML = html2;
};

function sendMSG(msg) {
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
    xmlhttp = new XMLHttpRequest();
  } else {
    //IE6, IE5 浏览器执行的代码
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("result").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "search/search.php?q=" + JSON.stringify(msg), true);
  xmlhttp.send();
}

function btn() {
  var input = document.getElementById("input"); //获取输入框元素
  var sg = document.getElementById("grade"); //获取tag
  var ig = sg.selectedIndex;
  var sc = document.getElementById("college"); //获取college
  var ic = sc.selectedIndex;

  var data=[];
  data.push(sg.options[ig].text);
  data.push(sc.options[ic].text);
  data.push(input.value);
  console.log(JSON.stringify(data));
  // $.ajax({
  //   dataType: "json",
  //   type: "GET",
  //   url: "search/search.php",
  //   data: JSON.stringify(data),
  //   timeout: 2000,
  //   success: function (data) {
  //     console.log("get data success");
  //     document.getElementById("result").innerHTML = data;
  //   },
  //   error: function () {
  //     console.log("false");
  //   }
    
  // });
  sendMSG(data);
}
